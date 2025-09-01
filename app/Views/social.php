<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Records</title>
    <style>
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
        }

        .top-content {
            flex: 1;
            margin-left: 250px;
            transition: margin-left 0.3s ease;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .top-content.expanded {
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

        /* Card Layout */
        .cards-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .card {
            flex: 1 1 calc(50% - 20px);
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 16px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        .card-text {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .card small {
            color: #888;
        }

        @media (max-width: 768px) {
            .top-content {
                margin-left: 0;
            }

            .card {
                flex: 1 1 100%;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <?php include('sidebar.php'); ?>

    <!-- Top bar + Records -->
    <div class="top-content" id="topContent">

        <!-- Top controls -->
        <div class="controls">
            <div class="search-container">
                <input type="text" class="search-bar" placeholder="Search records..." id="searchInput">
            </div>
            <button class="add-user-btn" onclick="openAddModal()">Add Record</button>
        </div>

        <!-- Records Container -->

        <div class="cards-row">
            <?php
            // Dummy array banaya (10 elements)
            $cards = range(1, 10);

            foreach ($cards as $index):
                ?>
                <div class="card" style="width: 18rem;">
                    <!-- <img src="<?= base_url('public/squirrel.jpg') ?>" class="card-img-top" alt="..."> -->
                    <img src="data:image/jpeg;base64,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">
                    <div class="card-body">
                        <h5 class="card-title">Card <?= $index ?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card’s content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

  
</body>

</html>