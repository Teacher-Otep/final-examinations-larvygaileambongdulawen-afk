<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <img src="../images/northhub.svg" id="logo" onclick="showWelcomeMessage()">
        <button class="navbarbuttons" onclick="showSection('create')">Create</button>
        <button class="navbarbuttons" onclick="showSection('read')">Read</button>
        <button class="navbarbuttons" onclick="showSection('update')">Update</button>
        <button class="navbarbuttons" onclick="showSection('delete')">Delete</button>
    </nav>

    <section id="home" class="homecontent"> 
        <h1 class="splash">Welcome to Student Management System</h1>
        <h2 class="splash">A Project in Integrative Programming Technologies</h2>
    </section>
    
    <!-- CREATE -->
    <section id="create" class="content">
        <h1 class="contenttitle">Insert New Student</h1>
        <form action="../includes/insert.php" method="POST">
            <label for="surname" class="label">Surname</label>
            <input type="text" name="surname" id="surname" class="field" required><br/>

            <label for="name" class="label">Name</label>
            <input type="text" name="name" id="name" class="field" required><br/>

            <label for="middlename" class="label">Middle name</label>
            <input type="text" name="middlename" id="middlename" class="field"><br/>

            <label for="address" class="label">Address</label>
            <input type="text" name="address" id="address" class="field"><br/>

            <label for="contact" class="label">Mobile Number</label>
            <input type="text" name="contact" id="contact" class="field"><br/>

            <div id="btncontainer">
                <button type="button" id="clrbtn" class="btns">Clear Fields</button>
                <button type="submit" id="savebtn" class="btns">Save</button>
            </div>

            <div id="success-toast" class="toast-hidden">Registration Successful!</div>
        </form>   
    </section>

    <!-- READ -->
    <section id="read" class="content">
        <h1 class="contenttitle">View Students</h1>
        <?php include("../includes/read.php"); ?>
    </section>

    <!-- UPDATE -->
    <section id="update" class="content">
    <h1 class="contenttitle">Update Student Records</h1>
    <?php
    include("../includes/db.php");

    // If an ID is selected, fetch that student's data
    $studentData = null;
    if (isset($_GET['edit_id'])) {
        $edit_id = intval($_GET['edit_id']);
        $sql = "SELECT * FROM students WHERE id=$edit_id";
        $studentData = $conn->query($sql)->fetch_assoc();
    }

    // Dropdown list of students
    $sql = "SELECT id, surname, name FROM students";
    $result = $conn->query($sql);
    ?>
    <form method="GET" action="">
        <label for="edit_id" class="label">Select Student</label>
        <select name="edit_id" id="edit_id" class="field" required onchange="this.form.submit()">
            <option value="">-- Choose --</option>
            <?php while($row = $result->fetch_assoc()) { ?>
                <option value="<?php echo $row['id']; ?>" 
                    <?php if(isset($edit_id) && $edit_id == $row['id']) echo "selected"; ?>>
                    <?php echo $row['id']." - ".$row['surname'].", ".$row['name']; ?>
                </option>
            <?php } ?>
        </select>
    </form>

    <?php if ($studentData) { ?>
    <form action="../includes/update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $studentData['id']; ?>">

        <label for="upd_name" class="label">Name</label>
        <input type="text" name="name" id="upd_name" class="field" 
               value="<?php echo $studentData['name']; ?>"><br/>

        <label for="upd_surname" class="label">Surname</label>
        <input type="text" name="surname" id="upd_surname" class="field" 
               value="<?php echo $studentData['surname']; ?>"><br/>

        <label for="upd_middlename" class="label">Middle name</label>
        <input type="text" name="middlename" id="upd_middlename" class="field" 
               value="<?php echo $studentData['middlename']; ?>"><br/>

        <label for="upd_address" class="label">Address</label>
        <input type="text" name="address" id="upd_address" class="field" 
               value="<?php echo $studentData['address']; ?>"><br/>

        <label for="upd_contact" class="label">Mobile Number</label>
        <input type="text" name="contact_number" id="upd_contact" class="field" 
               value="<?php echo $studentData['contact_number']; ?>"><br/>

        <button type="submit" class="btns">Update</button>
    </form>
    <?php } ?>
</section>

    <!-- DELETE -->
   <section id="delete" class="content">
    <h1 class="contenttitle">Remove Student Records</h1>
    <?php
    include("../includes/db.php");
    $sql = "SELECT id, surname, name FROM students";
    $result = $conn->query($sql);
    ?>
    <form action="../includes/delete.php" method="POST">
        <label for="id" class="label">Select Student</label>
        <select name="id" id="id" class="field" required>
            <option value="">-- Choose --</option>
            <?php while($row = $result->fetch_assoc()) { ?>
                <option value="<?php echo $row['id']; ?>">
                    <?php echo $row['id']." - ".$row['surname'].", ".$row['name']; ?>
                </option>
            <?php } ?>
        </select><br/>
        <button type="submit" class="btns">Delete</button>
    </form>
</section>

    <script src="script.js"></script>
</body>
</html>
