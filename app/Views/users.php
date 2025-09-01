<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>User Management System</h1>
            <p>Manage your users</p>
        </div>

        <div class="controls">
            <div class="search-container">
                <input type="text" class="search-bar" placeholder="Search users...">
            </div>
            <a href="<?= base_url('/users/create') ?>">
                <button class="add-user-btn">Add User</button>
            </a>
        </div>

        <div class="table-container">
            <table class="user-table">
                <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $row): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['age'] ?></td>
                            <td><?= $row['number'] ?></td>
                            <td>
                            <div class="action-buttons">
                                <a href="<?= base_url('/users/edit/'.$row['id']) ?>">
                                    <button class="btn-edit">Edit</button>
                                </a>
                                <a href="<?= base_url('/users/delete/'.$row['id']) ?>">
                                    <button class="btn-delete">Delete</button>
                                </a>
                            </div>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>

        <!-- Default pagination -->
        <div class="pagination">
            <?= $pager->links() ?>
        </div>
                
    </div>
</body>
</html>
