<?php
require_once __DIR__ . '/../functions.php';
require_once __DIR__ . '/../../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' : ''; ?>Gaming Gear Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <base href="<?php echo BASE_URL; ?>/">
</head>
<body class="bg-gray-50">
<nav class="bg-white shadow-lg fixed w-full z-10">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Left Section: Categories -->
            <div class="flex space-x-6">
                <a href="#" class="text-gray-800 hover:text-gray-600 font-medium">WOMEN</a>
                <a href="#" class="text-gray-800 hover:text-gray-600 font-medium">MEN</a>
                <a href="#" class="text-gray-800 hover:text-gray-600 font-medium">CHILDREN</a>
                <a href="#" class="text-gray-800 hover:text-gray-600 font-medium">POPULAR</a>
            </div>
            
            <!-- Center Section: Logo -->
            <div class="flex items-center">
                <a href="index.php" class="text-2xl font-bold text-gray-800 font-montserrat">LARA.</a>
            </div>
            
            <!-- Right Section: Search, Profile Dropdown, and Cart -->
            <div class="flex items-center space-x-4">
                <!-- Search Bar -->
                <div class="relative flex items-center">
                    <input type="text" 
                           name="search" 
                           placeholder="Start typing here!" 
                           class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <i class="fas fa-search absolute left-3 text-gray-400"></i>
                </div>

                <!-- Profile Dropdown -->
                <?php if (isLoggedIn()): ?>
                    <div class="ml-3 relative">
                        <button id="profile-toggle" class="p-2 text-gray-400 hover:text-gray-500">
                            <i class="fas fa-user text-xl"></i>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="profile-dropdown" 
                             class="hidden absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 z-50">
                            <a href="customer/profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Profile Settings
                            </a>
                            <a href="customer/manage_address.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Manage Addresses
                            </a>
                            <a href="customer/order_history.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Order History
                            </a>
                            <?php if (isAdmin()): ?>
                                <a href="admin/dashboard.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Admin Dashboard
                                </a>
                            <?php endif; ?>
                            <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Logout
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="login.php" class="text-gray-500 hover:text-gray-700 px-3 py-2 text-sm font-medium">
                        Login
                    </a>
                    <a href="register.php" class="bg-blue-500 text-white hover:bg-blue-600 px-4 py-2 rounded-md text-sm font-medium">
                        Register
                    </a>
                <?php endif; ?>

                <!-- Cart -->
                <a href="cart.php" class="text-gray-400 hover:text-gray-500 relative">
                    <i class="fas fa-shopping-bag text-xl"></i>
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    // Handle dropdown toggle
    const profileToggle = document.getElementById('profile-toggle');
    const profileDropdown = document.getElementById('profile-dropdown');

    profileToggle.addEventListener('click', () => {
        profileDropdown.classList.toggle('hidden');
    });

    // Close dropdown if clicked outside
    document.addEventListener('click', (event) => {
        if (!profileDropdown.contains(event.target) && !profileToggle.contains(event.target)) {
            profileDropdown.classList.add('hidden');
        }
    });
</script>
