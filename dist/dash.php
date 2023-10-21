<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

Session_start();
include("connections.php");
include("functions.php");
$user_data = check_login($con);
$account_data = retrieve_account($con);
$user_id = $user_data['user_id'];
$result = get_recent_transactions($con, $user_id);
$resultts = get_recent_expenseIncome($con, $user_id);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // Retrieve data from the form
  $category = $_POST['category'];
  $monthly = $_POST['monthly'];
  $descriptioned = $_POST['descriptioned'];
  $limit = $_POST['limit'];

  if (!empty($category) && !empty($limit) && !is_numeric($category)) {
    //save to database
    $query = "INSERT INTO  budgets ( user_id, category, monthly, descriptioned, limit_amount) 
    		VALUES('$user_id','$category','$monthly', '$descriptioned', '$limit')";
    mysqli_query($con, $query);
    echo "<script>alert('Budget added successfully!');</script>";
  } else {
    echo "<script>alert('Budget not added!');</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="output.css" />
  <link rel="stylesheet" href="custom.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="img/ExP.png" type="image/x-icon">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        td {
            color: black;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        .list {
        list-style-type: none;
        padding: 0;
        margin-bottom: 40px;
      }

      .list li {
        background-color: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12),;
        color: #333;
        display: flex;
        justify-content: space-between;
        position: relative;
        padding: 10px;
        margin: 10px 0;
      }
      
       
    </style>
</head>
<body>
<div x-data="setup()" x-init="$refs.loading.classList.add('hidden');" @resize.window="watchScreen()">
      <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
        <!-- Loading screen -->
        <div
          x-ref="loading"
          class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-indigo-800"
        >
          Loading.....
        </div>

        <!-- Sidebar -->
        <div class="flex flex-shrink-0 transition-all">
          <div
            x-show="isSidebarOpen"
            @click="isSidebarOpen = false"
            class="fixed inset-0 z-10 bg-black bg-opacity-50 lg:hidden"
          ></div>
          <div x-show="isSidebarOpen" class="fixed inset-y-0 z-10 w-16 bg-white"></div>

          <!-- Mobile bottom bar -->
          <nav
            aria-label="Options"
            class="fixed inset-x-0 bottom-0 flex flex-row-reverse items-center justify-between px-4 py-2 bg-white border-t border-indigo-100 sm:hidden shadow-t rounded-t-3xl"
          >
            <!-- Menu button -->
            <button
              @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
              class="p-2 transition-colors rounded-lg shadow-md hover:bg-indigo-800 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2"
              :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-indigo-600' : 'text-gray-500 bg-white'"
            >
              <span class="sr-only">Toggle sidebar</span>
              <svg
                aria-hidden="true"
                class="w-6 h-6"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
              </svg>
            </button>

            <!-- Logo -->
            <a href="#">
            <img class="w-10 h-auto" src="img/ExP.png" alt="ExP" />
            </a>

            <!-- User avatar button -->
            <div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">
              <button
                @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})"
                class="transition-opacity rounded-lg opacity-80 hover:opacity-100 focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2"
              >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
                <circle cx="12" cy="10" r="3" />
                <circle cx="12" cy="12" r="10" />
              </svg>
                <span class="sr-only">User menu</span>
              </button>
              <div
                x-show="isOpen"
                @click.away="isOpen = false"
                @keydown.escape="isOpen = false"
                x-ref="userMenu"
                tabindex="-1"
                class="absolute w-48 py-1 mt-2 origin-bottom-left bg-white rounded-md shadow-lg left-10 bottom-14 focus:outline-none"
                role="menu"
                aria-orientation="vertical"
                aria-label="user menu"
              >
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                  ><?php echo $user_data["fullname"]; ?></a
                >

                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"><?php echo $user_data["username"]; ?></a>

                <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
              </div>
            </div>
          </nav>

          <!-- Left mini bar -->
          <nav
            aria-label="Options"
            class="z-20 flex-col items-center flex-shrink-0 hidden w-16 py-4 bg-white border-r-2 border-indigo-100 shadow-md sm:flex rounded-tr-3xl rounded-br-3xl"
          >
            <!-- Logo -->
            <div class="flex-shrink-0 py-4">
              <a href="#">
              <img class="w-10 h-auto" src="img/ExP.png" alt="ExP" />
              </a>
            </div>
            <div class="flex flex-col items-center flex-1 p-2 space-y-4">
              <!-- Menu button -->
              <button
                @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
                class="p-2 transition-colors rounded-lg shadow-md hover:bg-indigo-800 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2"
                :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-indigo-600' : 'text-gray-500 bg-white'"
              >
                <span class="sr-only">Toggle sidebar</span>
                <svg
                  aria-hidden="true"
                  class="w-6 h-6"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
              </button>
              <!-- Messages button -->
              
              <!-- Notifications button -->
              
            </div>

            <!-- User avatar -->
            <div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">
              <button
                @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})"
                class="transition-opacity rounded-lg opacity-80 hover:opacity-100 focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2"
              >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
                <circle cx="12" cy="10" r="3" />
                <circle cx="12" cy="12" r="10" />
              </svg>
                <span class="sr-only">User menu</span>
              </button>
              <div
                x-show="isOpen"
                @click.away="isOpen = false"
                @keydown.escape="isOpen = false"
                x-ref="userMenu"
                tabindex="-1"
                class="absolute w-48 py-1 mt-2 origin-bottom-left bg-white rounded-md shadow-lg left-10 bottom-14 focus:outline-none"
                role="menu"
                aria-orientation="vertical"
                aria-label="user menu"
              >
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                  ><?php echo $user_data["fullname"]; ?></a
                >

                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"><?php echo $user_data["username"]; ?></a>

                <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
              </div>
            </div>
          </nav>

          <div
            x-transition:enter="transform transition-transform duration-300"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition-transform duration-300"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            x-show="isSidebarOpen"
            class="fixed inset-y-0 left-0 z-10 flex-shrink-0 w-64 bg-white border-r-2 border-indigo-100 shadow-lg sm:left-16 rounded-tr-3xl rounded-br-3xl sm:w-72 lg:static lg:w-64"
          >
            <nav x-show="currentSidebarTab == 'linksTab'" aria-label="Main" class="flex flex-col h-full">
              <!-- Logo -->
              <div class="flex items-center justify-center flex-shrink-0 py-10">
                <a href="#">
                  
                  <img class="w-10 h-auto" src="img/ExP.png" alt="ExP" />
                </a>
              </div>

              <!-- Links -->
              <div class="flex-1 px-4 space-y-2 overflow-hidden hover:overflow-auto">
                <a href="#" id="homLink" class="flex items-center w-full space-x-2 text-white bg-indigo-600 rounded-lg">
                  <span aria-hidden="true" class="p-2 bg-indigo-700 rounded-lg">
                    <svg
                      class="w-6 h-6"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                      />
                    </svg>
                  </span>
                  <span>Home</span>
                </a>
                <a
                  href="#"
                  id="budgetLink"
                  class="flex items-center space-x-2 text-indigo-600 transition-colors rounded-lg group hover:bg-indigo-600 hover:text-white"
                >
                  <span
                    aria-hidden="true"
                    class="p-2 transition-colors rounded-lg group-hover:bg-indigo-700 group-hover:text-white"
                  >
                    <svg
                      class="w-6 h-6"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                      />
                    </svg>
                  </span>
                  <span>Budget Management</span>
                </a>
              </div>

              
            </nav>

            
          </div>
        </div>
        <div class="flex flex-col flex-1">
          

          <div class="flex flex-1">
            <!-- Main -->
            <main class="flex items-center justify-center flex-1 px-4 py-8">
              
            <div id="expenseTracker" class="wrapper">
              <h2>Expense Tracker</h2>

              <div class="container">
                <h4>Your Balance</h4>
                <h1 id="balance">$<?php echo $account_data['balance'] ?></h1>

                <div class="inc-exp-container">
                  <div>
                    <h4>Income</h4>
                    <p id="money-plus" class="money plus">$<?php echo $account_data['income'] ?></p>
                  </div>
                  <div>
                    <h4>Expense</h4>
                    <p id="money-minus" class="money minus">$<?php echo $account_data['expense'] ?></p>
                  </div>
                </div>

                <h3>History</h3>
                <ul id="list" class="list">
                <?php 
                    if (mysqli_num_rows($resultts) > 0) {

                        # code...
                        while ($row = mysqli_fetch_assoc($resultts)) {
                            $id = $row['id'];
                            echo "
                                <li>
                                {$row['type']} 
                                <span>{$row['comodity']}</span> 
                                <span>{$row['amount']}</span> 
                                <button tittle='Delete' style='background-color: #c0392b; padding: 5px; color: #fff;'><a href='deleteExpense.php?deletid=$id'>x</a></button>
                                
                            ";
                        }
                    }else {
                        echo "<tr>
                          <td colspan='3'>No Recent Managements</td>
                        </tr>";
                      }
                    ?>
                </ul>

                <h3>New transaction</h3>
                <form id="form" method="post" action="addExpense.php">
                  <div class="form-control">
                    <label for="amount">Transaction type</label><br />
                    <select name="type">
                      <option value="income" selected>Income</option>
                      <option value="expense">Expense</option>
                    </select>
                  </div>
                  <div class="form-control">
                    <label for="text">Commodity</label>
                    <input type="text" id="text" name="commodity" placeholder="Enter text..." />
                  </div>
                  <div class="form-control">
                    <label for="amount">Amount($)</label>
                    <input type="text" id="amount" name="amount" placeholder="Enter amount ..." />
                  </div>
                  <button class="btn">Add transaction</button>
                </form>
              </div>
            </div>
              <!-- Content -->
              <div id="managementPage" class="hidden wrapper">
                <div class="container mx-auto">
                    <h2 class="text-center text-blue-500">Budget Management</h2>
                    <form autocomplete="off" action="dash.php" method="post">
                  <label for="category">Category:</label>
                  <input type="text" name="category" class="mb-6">

                  <label for="limit">Month:</label>
                  <input type="text" name="limit" class="mb-6">

                  <label for="monthly">Monthly Limit:</label>
                  <input type="number" name="monthly" class="mb-6">

                  <label for="descriptioned">Description:</label>
                  <textarea name="descriptioned" cols="40" rows="10"></textarea>

                  <button type="submit" class="btn bg-blue-500">Add Budget</button>
                </form>
                <h2 class="text-center text-blue-500">Budget List </h2>
                <table style="width: 100%;">
  <tr style="color: black;">
    <th>Category</th>
    <th>Month</th>
    <th>Description</th>
    <th>Limit</th>
    <th>Operation</th>
  </tr>
  <?php
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      echo
      "<tr>
        <td>{$row['category']}</td>
        <td>{$row['monthly']}</td>
        <td>{$row['descriptioned']}</td>
        <td>$ {$row['limit_amount']}</td>
        <td>
          <button style='background-color: #c0392b; padding: 5px; color: #fff;'><a href='delete.php?deleteid=$id'>Delete</a></button>
        </td>
      </tr>";
    }
  } else {
    echo "<tr>
      <td colspan='3'>No Recent Managements</td>
    </tr>";
  }
  ?>
</table>

                </div>
              </div>
            </main>
          </div>
        </div>
      </div>

      <!-- Panels -->

      <!-- Settings Panel -->
      <!-- Backdrop -->
      <!-- <div
        x-show="isSettingsPanelOpen"
        class="fixed inset-0 bg-black bg-opacity-50"
        @click="isSettingsPanelOpen = false"
        aria-hidden="true"
      ></div> -->
      <!-- Panel -->
      <!-- <section
        x-transition:enter="transform transition-transform duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition-transform duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        x-show="isSettingsPanelOpen"
        class="fixed inset-y-0 right-0 w-64 bg-white border-l border-indigo-100 rounded-l-3xl"
      >
        <div class="px-4 py-8">
          <h2 class="text-lg font-semibold">Settings</h2>
        </div>
      </section> -->


    
  </div>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <script>
        const setup = () => {
            return {
            isSidebarOpen: false,
            currentSidebarTab: null,
            isSettingsPanelOpen: false,
            isSubHeaderOpen: false,
            watchScreen() {
                if (window.innerWidth <= 1024) {
                this.isSidebarOpen = false
                }
            },
        }
      }
    </script>
    <script>
  document.addEventListener("DOMContentLoaded", function () {
    // Your JavaScript code here
    const home = document.getElementById('homLink');
    const budgetLink = document.getElementById('budgetLink'); 
    const management = document.getElementById('managementPage');
    const expense = document.getElementById('expenseTracker');

    // Hide expense/income and show budget management
    budgetLink.addEventListener('click', () => {
      management.classList.remove('hidden'); // Remove the 'hidden' class
      expense.style.display= 'none';
      console.log("clicked");
    });

    // Hide budget management and show expense/income
    home.addEventListener('click', () => {
      expense.style.display = "block";
      management.classList.add('hidden');
    });
  });
</script>

</body>
</html>