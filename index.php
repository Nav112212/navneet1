<?php
require_once "config.php";
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>McDonald's Home Page</title>
        <link rel="stylesheet" href="home.css">
    </head>

    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="menu.html">Menu</a></li>
                    <li><a href="locations.html">Locations</a></li>
                    <li><a href="about.html">About Us</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <section id="welcome">
                <h1>Welcome to McDonald's</h1>
                <p>Discover our delicious menu, find a nearby location, and learn more about our company.</p>
                <a href="menu.html" class="btn">Explore Menu</a>
            </section>
        </main>
        <section id="employees">
            <h2>Employees</h2>
            <div class="container">
                <ul>
                    <li><a href="create.php">Add New Employee</a></li>
                </ul>
            </div>
            <?php
        require_once "config.php";
    
        $query = "SELECT * FROM employees";
        $result = mysqli_query($link, $query);
    
        if (mysqli_num_rows($result) > 0) :
            ?>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td>
                                <?php echo $row['id']; ?>
                            </td>
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                            <td>
                                <?php echo $row['address']; ?>
                            </td>
                            <td>
                                <?php echo $row['salary']; ?>
                            </td>
                            <td>
                                <a href="read.php?id=<?php echo $row['id']; ?>" title="View Record">View</a>
                                <a href="update.php?id=<?php echo $row['id']; ?>" title="Update Record">Update</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" title="Delete Record">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <?php else : ?>
                <p>No records found.</p>
                <?php endif; ?>
        </section>
        <footer>
        <p>&copy; Made by Navneet_Assignment_2</p>
        </footer>
    </body>

    </html>