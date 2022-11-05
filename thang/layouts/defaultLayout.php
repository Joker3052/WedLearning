<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
</head>
<body>
    <div class="container">
        <!-- Header -->
        <?php include 'layouts/components/header.php'; ?>
        <hr/>

        <div class="body row">
            <!-- Sidebar -->
            <div class="sidebar col-3">
                <?php include 'layouts/components/sidebar.php' ?>
            </div>
            <!-- Content -->
            <div class="content col-9">
                <?php if ($childView) include($childView); ?>
                <?php if ($child) echo $child; ?>
                <?php 
                switch ($action)
                {
                    case 'Index':
                        $controller->Index($args);
                        break;
                    case 'Detail':
                        $controller->Detail($arg);
                        break;
                    case 'Create':
                        $controller->Create();
                        break;
                    case 'Edit':
                        $controller->Edit($arg);
                        break;
                    case 'Delete':
                        $controller->Delete($arg);
                        break;
                    case 'Choices':
                        $controller->Choices();
                        break;
                    default:
                    break;
                }
                 ?>
            </div>        
        </div>
    </div>
</body>
</html>