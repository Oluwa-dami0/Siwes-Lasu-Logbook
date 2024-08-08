<?php

require_once "conn.php";
$week_id;
$user_id = 1;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    // echo "The ID is: " . htmlspecialchars($id);
    $week_id = $id;
} else {
    echo "No ID parameter provided.";
    $week_id = null;
    header("location: index"); 
    exit();
}

if ($week_id < 1 OR $week_id > 12) {
    header("location: index");
    exit();
}
$stmt = $conn->prepare("SELECT COUNT(*) FROM weekly_report WHERE user_id = ? AND id = ?");
$stmt->bind_param("ii", $user_id, $week_id);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count == 0) {
    $stmt = $conn->prepare("INSERT INTO weekly_report (user_id, id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $week_id);
    $stmt->execute();
    $stmt->close();

    echo "Week entry created successfully.";
} else {
    echo "Week entry already exists.";
}

echo "------------------> User ID: ". $user_id . "\n Week id: ".$week_id;
$stmt = $conn->prepare("SELECT monday, tuesday, wednesday, thursday, friday FROM weekly_report WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $week_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>-logbook</title>
    <meta charset="utf-8">

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">

    <!-- theme meta -->
    <meta name="theme-name" content="logbook" />

    <!-- plugins -->
    <link rel="preload" href="https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2"
        style="font-display: optional;">
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Montserrat:600%7cOpen&#43;Sans&amp;display=swap" media="screen">

    <link rel="stylesheet" href="./plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./plugins/slick/slick.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="./week.css">

    <!--Favicon-->
    <link rel="shortcut icon" href="Lasu_logo.jpg" type="image/x-icon">
    <link rel="icon" href="Lasu_logo.jpg" type="image/x-icon">

    <style>

    </style>
</head>

<body>
    <header class="sticky-top bg-white border-bottom border-default">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-white">
                <a class="navbar-brand" href="">
                    <img class="lasu-logo" width="75px" height="75px" src="Lasu_logo.jpg" alt="LogBook">
                </a>
                <h4>Student Industrial Work Experience Scheme Logbook</h4>
            </nav>
        </div>
    </header>
    <h3 class="mt-3"> Student Weekly Report</h3>
    <div class="table-container">
        <table id=myTable>
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Summary Of Work Done</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p class="" style="font-weight: bold; font-size: 15px;"> Monday</p>
                    </td>
                    <td>
                <form method="POST" action="process_week.php?week_id=<?php echo $week_id; ?>&day=monday&user_id=<?php echo $user_id; ?>">
                        <div style="display: flex; gap: 10px;">
                            <textarea id="monday" class="report" style="border: 1px solid black; border-radius: 5px; padding: 10px;"
                                placeholder=""   <?php if ($row["monday"] != ''){ ?> readonly <?php   } ?> name="monday">
                                <?php echo trim($row["monday"]) ?>
                            </textarea>
                            <button style="margin: 0; padding: 5px 10px; border-radius: 5px;" name="submit" class="bg-success text-white"
                            <?php if ($rows["monday"] != ''){ ?> disabled <?php   } ?>
                            >save</button>
                        </div>
                    </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="" style="font-weight: bold; font-size: 15px;"> Tuesday</p>
                    </td>
                    <td>

                    <form method="POST" action="process_week.php?week_id=<?php echo $week_id; ?>&day=tuesday&user_id=<?php echo $user_id; ?>">
                    <div style="display: flex; gap: 10px;">
                            <textarea id="tuesday" class="report" style="border: 1px solid black; border-radius: 5px; padding: 10px;"
                                placeholder=""  <?php if ( $row["tuesday"] != ""){ ?> readonly <?php   } ?> name="tuesday">
                                <?php echo trim($row["tuesday"]) ?>
                            </textarea>
                            <button style="margin: 0; padding: 5px 10px; border-radius: 5px;" name="submit" class="bg-success text-white"
                            <?php if ($row["tuesday"] != ''){ ?> disabled <?php   } ?>
                            >save</button>
                        </div>
                    </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="" style="font-weight: bold; font-size: 15px;"> Wednesday</p>
                    </td>
                    <td>

                    <form method="POST" action="process_week.php?week_id=<?php echo $week_id; ?>&day=wednesday&user_id=<?php echo $user_id; ?>">
                    <div style="display: flex; gap: 10px;">
                            <textarea id="wednesday" class="report" style="border: 1px solid black; border-radius: 5px; padding: 10px;"
                                placeholder=""  <?php if ($row["wednesday"] != ''){ ?> readonly <?php   } ?>  name="wednesday">
                                <?php echo trim($row["wednesday"]) ?>
                            </textarea>
                            <button style="margin: 0; padding: 5px 10px; border-radius: 5px;" name="submit" class="bg-success text-white"
                            <?php if ($row["wednesday"] != ''){ ?> disabled <?php   } ?>
                            >save</button>
                        </div>
                </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="" style="font-weight: bold; font-size: 15px;"> Thursday</p>
                    </td>
                    <td>

                    <form method="POST" action="process_week.php?week_id=<?php echo $week_id; ?>&day=thursday&user_id=<?php echo $user_id; ?>">
                    <div style="display: flex; gap: 10px;">
                            <textarea id="thursday" class="report" style="border: 1px solid black; border-radius: 5px;" 
                            rows="3"
                            <?php if ($row["thursday"] != ''){ ?> readonly <?php   } ?>
                                placeholder="" name="thursday"
                                >
                                <?php echo trim($row["thursday"]) ?>
                            </textarea>
                            <button style="margin: 0; padding: 5px 10px; border-radius: 5px;" name="submit" class="bg-success text-white"
                            <?php if ($row["thursday"] != ''){ ?> disabled <?php   } ?>
                            >save</button>
                        </div>
                    </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="" style="font-weight: bold; font-size: 15px;"> Friday</p>
                    </td>
                    <td>
                
                    <form method="POST" action="process_week.php?week_id=<?php echo $week_id; ?>&day=friday&user_id=<?php echo $user_id; ?>">
                    <div style="display: flex; gap: 10px;">
                            <textarea id="friday" class="report" style="border: 1px solid black; border-radius: 5px; text-align: left;" 
                            rows="3"
                                placeholder="" name="friday"
                                <?php if ($row["friday"] != ''){ ?> readonly <?php   } ?>
                                >
                                <?php echo trim($row["friday"]) ?>
                            </textarea>
                            <button style="margin: 0; padding: 5px 10px; border-radius: 5px;" name="submit" class="bg-success text-white"
                            <?php if ($row["friday"] != ''){ ?> disabled <?php   } ?>
                            >save</button>
                        </div>
                    </form>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- <div class="d-flex justify-content-center">
            <button style="border-radius: 0; width: 40%; margin: 10px 0; padding: 15px 0;">Submit</button>
        </div> -->
    </div>
</body>

</html>
