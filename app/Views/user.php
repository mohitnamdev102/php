<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <style>
        /* ...existing styles from test1/test.php... */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            /* min-height: 100vh; */
        }

        /* Main Content Styles */
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

        .container {
            flex: 1;
            margin: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }



        .header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        .header h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .controls {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }

        .search-container {
            position: relative;
            flex: 1;
            max-width: 300px;
        }

        .search-bar {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .search-bar:focus {
            outline: none;
            border-color: #007bff;
        }

        .add-user-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }

        .add-user-btn:hover {
            background-color: #0056b3;
        }

        .table-container {
            padding: 20px;
            overflow-x: auto;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        .user-table th {
            background-color: #f8f9fa;
            color: #333;
            padding: 12px;
            text-align: left;
            font-weight: bold;
            border-bottom: 2px solid #ddd;
        }

        .user-table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        .user-table tr:hover {
            background-color: #f8f9fa;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .btn-edit, .btn-delete {
            padding: 4px 8px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 12px;
        }

        .btn-edit {
            background-color: #28a745;
            color: white;
        }

        .btn-edit:hover {
            background-color: #218838;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5px 5px;
            background: #f8f9fa;
            border-top: 1px solid #ddd;
            flex-wrap: wrap;
            gap: 5px;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            background: white;
            border: 1px solid #ddd;
            color: #333;
            padding: 0px 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            text-decoration: none;
            min-width: 30px;
            text-align: center;
            margin: 1px;
            font-size: 14px;
        }

        .pagination a:hover {
            background-color: #e9ecef;
            border-color: #adb5bd;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .pagination .active {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
            font-weight: 600;
        }

        .pagination .disabled {
            background: #f8f9fa;
            color: #6c757d;
            cursor: not-allowed;
            border-color: #dee2e6;
            opacity: 0.6;
        }

        .pagination .pager {
            font-weight: 600;
            color: #007bff;
        }

        .page-info {
            margin: 0 15px;
            color: #666;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }

            .controls {
                flex-direction: column;
                gap: 15px;
            }

            .search-container {
                max-width: 100%;
            }

            .user-table {
                font-size: 12px;
            }

            .user-table th,
            .user-table td {
                padding: 8px 6px;
            }

            .action-buttons {
                flex-direction: column;
                gap: 3px;
            }

            .container {
                margin: 10px;
            }
        }

        /* Add modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0; top: 0;
            width: 100%; height: 100%;
            overflow: auto;
            background: rgba(0,0,0,0.4);
        }
        .modal-content {
            background: #fff;
            margin: 60px auto;
            padding: 20px 30px;
            border-radius: 8px;
            max-width: 400px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            position: relative;
        }
        .close {
            position: absolute;
            right: 15px;
            top: 10px;
            font-size: 22px;
            font-weight: bold;
            color: #333;
            cursor: pointer;
        }
        .modal h2 { text-align: center; margin-bottom: 20px; }
        .modal label { display: block; margin-top: 10px; }
        .modal input[type="text"], .modal input[type="number"] {
            width: 100%; padding: 8px; margin-top: 5px;
            border: 1px solid #ddd; border-radius: 4px;
        }
        .modal .btn { background: #007bff; color: white; border: none; padding: 10px 16px; border-radius: 4px; cursor: pointer; margin-top: 15px; width: 100%;}
        .modal .btn:hover { background: #0056b3; }
    </style>
</head>
<body>

    <!-- Include Sidebar -->
    <?php include('sidebar.php'); ?>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- <div class="container"> -->

        <div class="controls">
            <div class="search-container">
                <input type="text" class="search-bar" placeholder="Search users..." id="searchInput">
            </div>
            <button class="add-user-btn" onclick="openAddModal()">Add User</button>
        </div>


        <!-- Test2 : User List Modal -->
        <div class="table-container">
            <table class="user-table">
                <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Number</th>
                        <th>Roll</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                    <?php foreach($users as $row): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['age'] ?></td>
                            <td><?= $row['number'] ?></td>
                            <td><?= $row['roll'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['password'] ?></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-edit" onclick="openEditModal(<?= $row['id'] ?>, '<?= htmlspecialchars($row['name'], ENT_QUOTES) ?>', <?= $row['age'] ?>, '<?= htmlspecialchars($row['number'], ENT_QUOTES) ?>')">Edit</button>
                                    <form action="<?= base_url('/test2/delete/'.$row['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Delete this user?');">
                                        <?= csrf_field() ?>
                                        <button class="btn-delete" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>                  
                </tbody>
            </table>
        </div>
        <div class="pagination">
            <?= $pager->links() ?>
        </div>
    </div>

    <!-- Test2 : Add User Modal -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeAddModal()">&times;</span>
            <h2>Add User</h2>
            <form action="<?= base_url('/test2/store') ?>" method="post">
                <?= csrf_field() ?>
                <label for="add_name">Name</label>
                <input type="text" name="name" id="add_name" required>
                <label for="add_age">Age</label>
                <input type="number" name="age" id="add_age" required>
                <label for="add_number">Number</label>
                <input type="text" name="number" id="add_number" required>
                <label for="add_roll">Roll</label>
                <input type="text" name="roll" id="add_roll" required>
                <label for="add_email">Email</label>
                <input type="email" name="email" id="add_email" required>
                <label for="add_password">Password</label>
                <input type="password" name="password" id="add_password" required>
                <button type="submit" class="btn">Add User</button>
            </form>
        </div>
    </div>

    <!-- Test2 : Edit User Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h2>Edit User</h2>
            <form id="editForm" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="id" id="edit_id">
                <label for="edit_name">Name</label>
                <input type="text" name="name" id="edit_name" required>
                <label for="edit_age">Age</label>
                <input type="number" name="age" id="edit_age" required>
                <label for="edit_number">Number</label>
                <input type="text" name="number" id="edit_number" required>
                <label for="edit_roll">Roll</label>
                <input type="text" name="roll" id="edit_roll" required>
                <label for="edit_email">Email</label>
                <input type="email" name="email" id="edit_email" required>
                <label for="edit_password">Password</label>
                <input type="text" name="password" id="edit_password" required>
                <button type="submit" class="btn">Update</button>
            </form>
        </div>
    </div>
    </div> <!-- End main-content -->
    

    <script>
        // Modal functions
        function openAddModal() {
            document.getElementById('addModal').style.display = 'block';
        }
        function closeAddModal() {
            document.getElementById('addModal').style.display = 'none';
        }
        function openEditModal(id, name, age, number) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_age').value = age;
            document.getElementById('edit_roll').value = roll;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_password').value = password;
            document.getElementById('editForm').action = "<?= base_url('/test2/update/') ?>" + id;
            document.getElementById('editModal').style.display = 'block';
        }
        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        // Close modal on outside click
        window.onclick = function(event) {
            if (event.target == document.getElementById('addModal')) closeAddModal();
            if (event.target == document.getElementById('editModal')) closeEditModal();
        }

        // Optional: Simple client-side search
        document.getElementById('searchInput').addEventListener('input', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#userTableBody tr');
            rows.forEach(row => {
                let name = row.children[1].textContent.toLowerCase();
                let number = row.children[3].textContent.toLowerCase();
                row.style.display = (name.includes(filter) || number.includes(filter)) ? '' : 'none';
            });
        });
    </script>
</body>
</html>