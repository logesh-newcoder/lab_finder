<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>    
        <div class="top">
            <h2>LAB 4</h2>
            <a href="mailto:logeshakn45@gmail.com"><img src="mail.svg" alt=""></a>
        </div>
    </header>
    <main>
        <div class="table">                    
            <table>
                <tr class="dayper">                        
                    <th>DAYS/ PERIODS</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>                        
                </tr>
                <!-- Each day of the week with class buttons -->
                <tr>
                    <th class="dayper">MON</th>
                    <td colspan="3"><button onclick="showInfo('CLA-101',this)">BSC.CS-3-B</button></td>
                    <!-- <td><button onclick="showInfo('CLA-102',this)"></button></td>
                    <td><button onclick="showInfo('CLA-103',this)"></button></td> -->
                    <td colspan="2"><button onclick="showInfo('CLA-104',this)">BSC.CS-3-A</button></td>
                    <!-- <td><button onclick="showInfo('CLA-105',this)"></button></td> -->
                </tr>
                <tr>
                    <th class="dayper">TUE</th>
                    <td colspan="2"><button onclick="showInfo('CLA-106',this)">BSC.IT-2-A</button></td>
                    <!-- <td><button onclick="showInfo('CLA-107',this)"></button></td> -->
                    <td><button onclick="showInfo('CLA-108',this)">BSC.IT-3-A</button></td>
                    <td colspan="2"><button onclick="showInfo('CLA-109',this)">BSC.IT-3-A</button></td>
                    <!-- <td><button onclick="showInfo('CLA-110',this)"></button></td> -->
                </tr>
                <tr>
                    <th class="dayper">WED</th>
                    <td colspan="3"><button onclick="showInfo('CLA-111',this)">FREE</button></td>
                    <!-- <td><button onclick="showInfo('CLA-112',this)"></button></td>
                    <td><button onclick="showInfo('CLA-113',this)"></button></td> -->
                    <td colspan="2"><button onclick="showInfo('CLA-114',this)">BSC.CS-2-A</button></td>
                    <!-- <td><button onclick="showInfo('CLA-115',this)"></button></td> -->
                </tr>
                <tr>
                    <th class="dayper">THU</th>
                    <td colspan="3"><button onclick="showInfo('CLA-116',this)">BSC.CS-2-B</button></td>
                    <!-- <td><button onclick="showInfo('CLA-117',this)"></button></td>
                    <td><button onclick="showInfo('CLA-118',this)"></button></td> -->
                    <td colspan="2"><button onclick="showInfo('CLA-119',this)">FREE</button></td>
                    <!-- <td><button onclick="showInfo('CLA-120',this)"></button></td> -->
                </tr>
                <tr>
                    <th class="dayper">FRI</th>
                    <td colspan="3"><button onclick="showInfo('CLA-121',this)">BSC.CS-1-A</button></td>
                    <!-- <td><button onclick="showInfo('CLA-122',this)"></button></td>
                    <td><button onclick="showInfo('CLA-123',this)"></button></td> -->
                    <td colspan="2"><button onclick="showInfo('CLA-124',this)">BSC.IT-2-A</button></td>
                    <!-- <td><button onclick="showInfo('CLA-125',this)"></button></td> -->
                </tr>
                <tr>
                    <th class="dayper">SAT</th>
                    <td colspan="3"><button onclick="showInfo('CLA-126',this)">BSC.IT-1-A</button></td>
                    <!-- <td><button onclick="showInfo('CLA-127',this)"></button></td>
                    <td><button onclick="showInfo('CLA-128',this)"></button></td> -->
                    <td colspan="2"><button onclick="showInfo('CLA-129',this)">BSC.CS-3-B</button></td>
                    <!-- <td><button onclick="showInfo('CLA-130',this)"></button></td> -->
                </tr>
            </table>
        </div>
    
        <!-- Information Display Section -->
    
        <div class="displayer">    
            <h1>Please select the class for information</h1>
            <form id="info-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" id="classname" placeholder="Selected class name" name="class_name" readonly>
                <input type="hidden" id="classid" name="class_id" placeholder="id display hide">
                <textarea id="show" placeholder="Information will be shown here" name="class_content" readonly></textarea><br>
                <input type="submit" name="submit" value="Update" id="sub">
                <button type="button" onclick="deleteInfo()" id="del">DELETE</button>
            </form>
        </div>
    </main>
    <div class="php">
         <?php
            // Database connection
            $db_server = "localhost";
            $db_user = "root";
            $db_pass = "";
            $db_name = "lab";
            $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
            if(!$conn){
                echo "Error in connection";
            }
            // Update functionality on POST request
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $selectid = filter_input(INPUT_POST, "class_id", FILTER_SANITIZE_SPECIAL_CHARS);
                $selectinfo = filter_input(INPUT_POST, "class_content", FILTER_SANITIZE_SPECIAL_CHARS);
                if (empty($selectinfo)) {
                    echo "<script>alert('Please enter the information');</script>";
                } else {
                    $stmt = $conn->prepare("UPDATE lab_4 SET class_info = ? WHERE class_id = ?");
                    $stmt->bind_param("ss", $selectinfo, $selectid);
                    if ($stmt->execute()) {
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                    $stmt->close();
                }
            }
            // Fetching class data from database to display
            $sql = "SELECT * FROM lab_4";
            $res = mysqli_query($conn, $sql);
            echo "<table>
                    <tr>
                        <th>Class_id</th>
                        <th>Class_info</th>
                    </tr>";
            if (mysqli_num_rows($res) > 0) {
                $id_inc = 100;
                while ($row = mysqli_fetch_assoc($res)) {
                    $id_inc++;
                    echo "<tr><td>".$row["class_id"]."</td><td id='CLA-$id_inc'>".$row["class_info"]."</td></tr>";
                }
                echo "</table>";
            }
            mysqli_close($conn);
        ?>
    </div>

    <script src="script.js"></script>
</body>
</html>
