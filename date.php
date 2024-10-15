<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Дельта дат</title>
</head>
<body>
    <?php
    $date1 = isset($_POST['date1']) ? $_POST['date1'] : '';
    $date2 = isset($_POST['date2']) ? $_POST['date2'] : '';
    $days = '';
    $minutes = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $datetime1 = new DateTime($date1);
        $datetime2 = new DateTime($date2);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->days;
        $minutes = $days * 1440;
    }
    ?>
    <div>
    <form method="post" action="date.php">
      <div>
        <label for="date1">Дата 1:</label>
        </div>
        <div>
        <input type="date" id="date1" name="date1" value="<?php echo htmlspecialchars($date1); ?>" required>
        </div>
        <div>
        <label for="date2">Дата 2:</label>
        </div>
        <div>
        <input type="date" id="date2" name="date2" value="<?php echo htmlspecialchars($date2); ?>" required>
        </div>
        <div>
        <input type="submit" value="Вычислить">
        </div>
    </form>
    </div>
    <?php if ($days !== '' && $minutes !== ''): ?>
        <p>Кол-во дней между датами: <?php echo $days; ?></p>
        <p>Кол-во минут между датами: <?php echo $minutes; ?></p>
    <?php endif; ?>
</body>
</html>