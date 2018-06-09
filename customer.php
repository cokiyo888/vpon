<!doctype html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>about - Running</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
	<script src="js/mobile.js" type="text/javascript"></script>
    
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <script>  
    
    // Data gathered from http://populationpyramid.net/germany/2015/

// Age categories
var categories = ['10hr', '11hr', '12hr', '13hr',
        '14hr', '15hr', '16hr', '17hr', '18hr',
        '19hr', '20hr', '21hr', '22hr'];
$(document).ready(function () {
    Highcharts.chart('container', {
        chart: {
            type: 'bar'
        },
        title: {
            text: '時 間 點 來 客 數'
        },
        subtitle: {
            text: '營業時間: <a href="http://populationpyramid.net/germany/2015/">10點~22點</a>'
        },
        xAxis: [{
            categories: categories,
            reversed: false,
            labels: {
                step: 1
            }
        }, { // mirror axis on right side
            opposite: true,
            reversed: false,
            categories: categories,
            linkedTo: 0,
            labels: {
                step: 1
            }
        }],
        yAxis: {
            title: {
                text: null
            },
            labels: {
                formatter: function () {
                    return Math.abs(this.value)+ '%';
                }
            }
        },

        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },

        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + ':' + this.point.category + '</b><br/>' +
                    '人數比例: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
            }
        },

        series: [{
            name: '增加人數比例',
            data: [-2.2, -2.2, -2.3, -2.5, -2.7, -3.1, -3.2,
                -3.0, -3.2, -4.3, -4.4, -3.6, -3.0]
        }, {
            name: '減少人數比例',
            data: [2.1, 2.0, 2.2, 2.4, 2.6, 3.0, 3.1, 2.9,
                3.1, 4.1, 4.3, 3.6, 3.4]
        }]
    });
});
</script>
</head>
<body>
	<div id="page">
		<div id="header">
			<div id="navigation">
				<span id="mobile-navigation">&nbsp;</span>
				<a href="index.html" class="logo"><img src="images/logo.png" alt=""></a>
				<ul id="menu">
					<li class="selected">
						<a href="index.html">home</a>
					</li>
					<li>
						<a href="customer.php">customer</a>
					</li>
					<li>
						<a href="customersensor.php">sensor</a>
						<ul>
							<li>
								<a href="runningsinglepost.html">analysis</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="team.html">
Team</a>
						<ul>
							<li>
								<a href="blogsinglepost.html">blog single post</a>
							</li>
						</ul>
					</li>
					
				</ul>
                
			</div>
		</div>
		<div id="body">
			<div> 
            	<br>
				<h1>時 間 點 來 客 數</h1>
                <br>
				<div id="container" style="min-width: 410px; max-width: 800px; height: 600px; margin: 0 auto"></div>	
                <br>
                <br>
                <br>
				<h2>來客數據可解決的問題</h2>
				<p>1.掌握尖峰時刻，讓人力不足問題加以改善<br>
                	2.改善人力調配問題<br>
                    3.改善常態性加班問題<br>
                    4.人力分配不均
                    </p>
				<h2>來客數據的運用</h2>
				<p>透過來客時間及數量，可以有效運用人力及銷售活動時間做運用<br>
                透過數據去編排人力，讓人力有效運用在對的時候，以避免超時及人力的過度加班的問題‧</p>
				<h2>店面總來客數統計</h2>
			<?php
                // build SELECT query
                $query = "SELECT * FROM Pcount ORDER BY W_ID DESC";
        
                // Connect to MySQL
                if ( !( $database = mysql_connect( "localhost",  
                "g04", "2017nchu_g04" ) ) )
                die( "<p>Could not connect to database</p></body></html>" );
   
                // open MailingList database
                if ( !mysql_select_db( "g04", $database ) )
                die( "<p>Could not open MailingList database</p>
                </body></html>" );

                // query MailingList database
                if ( !( $result = mysql_query( $query, $database ) ) ) 
                {
                print( "<p>Could not execute query!</p>" );
                die( mysql_error() . "</body></html>" );
                } // end if
            ?><!-- end PHP script -->
                
            <table>
            <tbody>
                <tr>
                    <th>W_ID</th>
                    <th>W_Date</th>
                    <th>W_Time</th>
                    <th>W_Pcount</th>
                    <th>W_Humidity</th>
                    <th>W_Temperature</th>
                    <th>W_Store</th>
                 </tr>
                  
            <?php
            // fetch each record in result set
            for ( $counter = 0; $row = mysql_fetch_row( $result );
               ++$counter )
            {
               // build table to display results
               
               print( "<tr>" );
               

               foreach ( $row as $key => $value ) 
                  print( "<td>$value</td>" );

                
               print( "</tr>" );
              
            } // end for

            mysql_close( $database );
         ?><!-- end PHP script -->
                 </tbody></table>
        </div>
        </div>
	    <div id="footer">
		<div>
			<div class="connect">
				<a href="#" class="twitter">twitter</a>
				<a href="#" class="facebook">facebook</a>
				<a href="#" class="googleplus">googleplus</a>
				<a href="#" class="pinterest">pinterest</a>
			</div>
			<p>&copy; </p>
			</div>
		</div>
	</div>
</body>
</html>
