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
            <h2>LAB 2</h2>
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
                    <td><button onclick="showInfo('CLA-101')">CLA-101</button></td>
                    <td><button onclick="showInfo('CLA-102')">CLA-102</button></td>
                    <td><button onclick="showInfo('CLA-103')">CLA-103</button></td>
                    <td><button onclick="showInfo('CLA-104')">CLA-104</button></td>
                    <td><button onclick="showInfo('CLA-105')">CLA-105</button></td>
                </tr>
                <tr>
                    <th class="dayper">TUE</th>
                    <td><button onclick="showInfo('CLA-106')">CLA-106</button></td>
                    <td><button onclick="showInfo('CLA-107')">CLA-107</button></td>
                    <td><button onclick="showInfo('CLA-108')">CLA-108</button></td>
                    <td><button onclick="showInfo('CLA-109')">CLA-109</button></td>
                    <td><button onclick="showInfo('CLA-110')">CLA-110</button></td>
                </tr>
                <tr>
                    <th class="dayper">WED</th>
                    <td><button onclick="showInfo('CLA-111')">CLA-111</button></td>
                    <td><button onclick="showInfo('CLA-112')">CLA-112</button></td>
                    <td><button onclick="showInfo('CLA-113')">CLA-113</button></td>
                    <td><button onclick="showInfo('CLA-114')">CLA-114</button></td>
                    <td><button onclick="showInfo('CLA-115')">CLA-115</button></td>
                </tr>
                <tr>
                    <th class="dayper">THU</th>
                    <td><button onclick="showInfo('CLA-116')">CLA-116</button></td>
                    <td><button onclick="showInfo('CLA-117')">CLA-117</button></td>
                    <td><button onclick="showInfo('CLA-118')">CLA-118</button></td>
                    <td><button onclick="showInfo('CLA-119')">CLA-119</button></td>
                    <td><button onclick="showInfo('CLA-120')">CLA-120</button></td>
                </tr>
                <tr>
                    <th class="dayper">FRI</th>
                    <td><button onclick="showInfo('CLA-121')">CLA-121</button></td>
                    <td><button onclick="showInfo('CLA-122')">CLA-122</button></td>
                    <td><button onclick="showInfo('CLA-123')">CLA-123</button></td>
                    <td><button onclick="showInfo('CLA-124')">CLA-124</button></td>
                    <td><button onclick="showInfo('CLA-125')">CLA-125</button></td>
                </tr>
                <tr>
                    <th class="dayper">SAT</th>
                    <td><button onclick="showInfo('CLA-126')">CLA-126</button></td>
                    <td><button onclick="showInfo('CLA-127')">CLA-127</button></td>
                    <td><button onclick="showInfo('CLA-128')">CLA-128</button></td>
                    <td><button onclick="showInfo('CLA-129')">CLA-129</button></td>
                    <td><button onclick="showInfo('CLA-130')">CLA-130</button></td>
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
                    $stmt = $conn->prepare("UPDATE lab_2 SET class_info = ? WHERE class_id = ?");
                    $stmt->bind_param("ss", $selectinfo, $selectid);
                    if ($stmt->execute()) {
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                    $stmt->close();
                }
            }
            // Fetching class data from database to display
            $sql = "SELECT * FROM lab_2";
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
