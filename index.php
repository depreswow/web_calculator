<?php
    if (isset($_POST["num"])) {
        if ($_POST["display"] == "0") {
            $displayValue = $_POST["num"];
        }
        else {
            $displayValue = $_POST["display"] . $_POST["num"];
        }
    }
    else {
        $displayValue = "0";
    }

    if (isset($_POST["operation"])) {
        setcookie("buffer", $_POST["display"], time() + 86400, "/");
        setcookie("operation", $_POST["operation"], time() + 86400, "/");
        $displayvalue = "0";
    }

    if (isset($_POST["result"])) {
        if (isset($_COOKIE["buffer"]) && isset($_COOKIE["operation"])) {
            switch($_COOKIE["operation"]) {

                case "+":
                    $displayValue = $_COOKIE["buffer"] + $_POST["display"];
                    break;

                case "-":
                    $displayValue = $_COOKIE["buffer"] - $_POST["display"];
                    break;

                case "x":
                    $displayValue = $_COOKIE["buffer"] * $_POST["display"];
                    break;
                
                case "%":
                    $displayValue = $_COOKIE["buffer"] / $_POST["display"];
                    break;

                case "C":
                    $displayValue = "0";
                    break;

            }
            setcookie("buffer", "0", time() - 1, "/");
            setcookie("operation", "0", time() - 1, "/");
        }
    }

    if (isset($_POST["clear"])) {
        $displayValue = "0";
        setcookie("buffer", "0", time() - 1, "/");
        setcookie("operation", "0", time() - 1, "/");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style><?php include('style.css'); ?></style>
</head>
<body>

    <div class="wrapper">
        <form action="index.php", method="post">
        <input class="display", type="text", name="display", value=<?php echo $displayValue;?>>
            <section class="calc-buttons">

                <div class="calc-button-row">
                    <input class="calc-button", type="submit", name="clear", value="C">
                    <input class="calc-button", type="submit", name="operation", value="+">
                    <input class="calc-button", type="submit", name="operation", value="-">
                    <input class="calc-button", type="submit", name="operation", value="x">
                    
                </div>
                <div class="calc-button-row">
                    <input class="calc-button", type="submit", name="num", value="7">
                    <input class="calc-button", type="submit", name="num", value="8">
                    <input class="calc-button", type="submit", name="num", value="9">
                    <input class="calc-button", type="submit", name="operation", value="%">
                    
                </div>
                <div class="calc-button-row">
                    <input class="calc-button", type="submit", name="num", value="4">
                    <input class="calc-button", type="submit", name="num", value="5">
                    <input class="calc-button", type="submit", name="num", value="6">
                    <input class="calc-button", type="submit", name="result", value="=">
                    
                </div>
                <div class="calc-button-row">
                    <input class="calc-button", type="submit", name="num", value="1">
                    <input class="calc-button", type="submit", name="num", value="2">
                    <input class="calc-button", type="submit", name="num", value="3">
                    <input class="calc-button", type="submit", name="num", value="0">
                </div>

            </section>
        </form>
    </div>

</body>
</html>
