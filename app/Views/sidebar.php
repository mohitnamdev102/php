<style>
    /* Sidebar Styles */
    .sidebar {
        width: 250px;
        background-color: #2c3e50;
        color: white;
        position: fixed;
        height: 100vh;
        left: 0;
        top: 0;
        transition: transform 0.3s ease;
        z-index: 1000;
        overflow-y: auto;
    }

    .sidebar.collapsed {
        transform: translateX(-100%);
    }

    .sidebar-header {
        padding: 20px;
        background-color: #34495e;
        border-bottom: 1px solid #4a5f7a;
    }

    .sidebar-header h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
    }

    .sidebar-nav {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .sidebar-nav li {
        border-bottom: 1px solid #4a5f7a;
    }

    .sidebar-nav a {
        display: block;
        padding: 15px 20px;
        color: #ecf0f1;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
    }

    .sidebar-nav a:hover {
        background-color: #34495e;
        padding-left: 30px;
    }

    .sidebar-nav a.active {
        background-color: #3498db;
    }

    .sidebar-nav a i {
        margin-right: 10px;
        width: 16px;
        text-align: center;
    }

    /* Sidebar Toggle Button */
    .sidebar-toggle {
        position: fixed;
        top: 20px;
        left: 20px;
        z-index: 1001;
        background-color: #3498db;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .sidebar-toggle:hover {
        background-color: #2980b9;
    }

    .sidebar-toggle.moved {
        left: 270px;
    }

    /* Main Content adjustment for sidebar */
    .main-content {
        flex: 1;
        margin-left: 250px;
        transition: margin-left 0.3s ease;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .main-content.expanded {
        margin-left: 0;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
        }

        .sidebar.show {
            transform: translateX(0);
        }

        .main-content {
            margin-left: 0;
        }

        .sidebar-toggle {
            left: 20px !important;
        }
    }
</style>


<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h3>MAICA</h3>
    </div>
    <ul class="sidebar-nav">
        <li><a href="/user" class="<?= (current_url() == base_url('/user')) ? 'active' : '' ?>"><i>👥</i>User</a></li>
        <li><a href="/social" class="<?= (current_url() == base_url('/social')) ? 'active' : '' ?>"><i>📊</i>Social</a></li>
        <li><a href="/about" class="<?= (current_url() == base_url('/about')) ? 'active' : '' ?>"><i>📈</i>About</a></li>
    </ul>
</div>

<script>
    // Sidebar toggle functionality
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const toggleBtn = document.getElementById('sidebarToggle');
        
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('expanded');
        toggleBtn.classList.toggle('moved');
        
        // For mobile, use different classes
        if (window.innerWidth <= 768) {
            sidebar.classList.toggle('show');
        }
    });

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        if (window.innerWidth <= 768) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('sidebarToggle');
            
            if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                sidebar.classList.remove('show');
            }
        }
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const toggleBtn = document.getElementById('sidebarToggle');
        
        if (window.innerWidth > 768) {
            sidebar.classList.remove('show');
            if (!sidebar.classList.contains('collapsed')) {
                mainContent.classList.remove('expanded');
                toggleBtn.classList.remove('moved');
            }
        } else {
            mainContent.classList.add('expanded');
            toggleBtn.classList.remove('moved');
        }
    });
</script>
