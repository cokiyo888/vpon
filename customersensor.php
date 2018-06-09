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
<script src="https://code.highcharts.com/modules/heatmap.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
   




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
				<h1>區 域 來 客 數 統 計</h1>
                <br>
				<div id="container" style="height: 400px; min-width: 360px; max-width: 800px; margin: 0 auto"></div>	
                <br>
                <br>
                <br>
				<h2>區域來客數統計可呈現各區域的來客量:  </h2>
				<p>1.瞭解顧客喜好，可在顧客熱區放置推廣商品，加以推廣<br>
                	2.可瞭解顧客動向，藉此加以改善動線流動的問題<br>
                    3.瞭解顧客喜好，掌握商品進貨數量，不再為庫存成本煩惱<br>
                    4.掌握熱門整體商品銷售，瞭解最近流行趨勢
                    </p>
				<h2>來客數據的策略運用</h2>
				<p>透過來客時間及數量及區域，可以有效運用人力及銷售活動時間做運用<br>
                透過數據去編排人力，讓人力有效運用在對的時候，以避免超時及人力的過度加班的問題‧</p>
				
        

			<?php
                // build SELECT query
                $query = "SELECT * FROM Sensor ORDER BY S_ID DESC";
        
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
                    <th>S_ID</th>
                    <th>S_Sensor1</th>
                    <th>S_Sensor2</th>
                    <th>S_Sensor3</th>
                    <th>S_Sensor4</th>
                    <th>S_Date</th>
                    <th>S_Time</th>
                    <th>S_Store</th>
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



         <script>  
   
Highcharts.chart('container', {

    chart: {
        type: 'heatmap',
        marginTop: 40,
        marginBottom: 80,
        plotBorderWidth: 1
    },


    title: {
        text: 'Customers stay store area'
    },

    xAxis: {
        categories: ['興大店美食區', '興大店3C區', '興大店飲料區', '興大店雜貨區','南屯店美食區', '南屯店3C區', '南屯店飲料區', '南屯店雜貨區', '烏日店雜貨區','烏日店美食區', '烏日店3C區', '烏日店飲料區', '烏日店雜貨區']
    },

    yAxis: {
        categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
        title: null
    },

    colorAxis: {
        min: 0,
        minColor: '#FFFFFF',
        maxColor: Highcharts.getOptions().colors[0]
    },

    legend: {
        align: 'right',
        layout: 'vertical',
        margin: 0,
        verticalAlign: 'top',
        y: 25,
        symbolHeight: 280
    },

    tooltip: {
        formatter: function () {
            return '<b>' + this.series.xAxis.categories[this.point.x] + '</b> sold <br><b>' +
                this.point.value + '</b> items on <br><b>' + this.series.yAxis.categories[this.point.y] + '</b>';
        }
    },

    series: [{
        name: 'Sales per employee',
        borderWidth: 1,
        data: [[0, 0, 10], [0, 1, 19], [0, 2, 8], [0, 3, 24], [0, 4, 67], [1, 0, 92], [1, 1, 58], [1, 2, 78], [1, 3, 117], [1, 4, 48], [2, 0, 35], [2, 1, 15], [2, 2, 123], [2, 3, 64], [2, 4, 52], [3, 0, 72], [3, 1, 132], [3, 2, 114], [3, 3, 19], [3, 4, 16], [4, 0, 38], [4, 1, 5], [4, 2, 8], [4, 3, 117], [4, 4, 115], [5, 0, 88], [5, 1, 32], [5, 2, 12], [5, 3, 6], [5, 4, 120], [6, 0, 13], [6, 1, 44], [6, 2, 88], [6, 3, 98], [6, 4, 96], [7, 0, 31], [7, 1, 1], [7, 2, 82], [7, 3, 32], [7, 4, 30], [8, 0, 85], [8, 1, 97], [8, 2, 123], [8, 3, 64], [8, 4, 84], [9, 0, 47], [9, 1, 114], [9, 2, 31], [9, 3, 48], [9, 4, 91]],
        dataLabels: {
            enabled: true,
            color: '#000000'
        }
    }]

});
 </script>


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
