<!-- Bootstrap CSS CDN -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Our Custom CSS -->
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/sidebar.css">
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<div class="datepicker datepicker-dropdown" style="top: 34px; left: 165.5px; display: block;">
    <div class="datepicker-days" style="display: block;">
        <table class=" table-condensed">
            <thead>
                <tr>
                    <th colspan="5" class="datepicker-switch">Nomor Soal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    echo('<tr>');
                    for($i = 1; $i <= 15; $i++) {
                        echo('<td class="day today">'.$i.'</td>');
                        if($i % 5 == 0) {
                            if($i % 15 == 0)
                                echo('</tr>');
                            else
                                echo('</tr><tr>');
                        }
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5" class="today" style="display: none;">Today</th>
                </tr>
                <tr>
                    <th colspan="5" class="clear" style="display: none;">Clear</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>