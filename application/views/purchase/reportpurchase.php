<html>

<head>

	<style>
		body {
			width: 100%;
		}

		.surat {
			width: 95%;
			left: 3%;
			position: absolute;
			

		}

		h2 {
			text-align: center;
		}

		h4 {
			text-align: center;
		}

		P {
			text-align: center;
		}

		.tbl {
			text-align: left;
			margin-bottom: 20px;
		}

		table {
			width: 100%;
			text-align: center;
			border-collapse: collapse;
			table-layout: fixed;
            border : white;
		}


		hr {
			height: 2px;
			background: #000;
			width: 100%;
		}

    th{
      padding : 10px;
      background : #a3b1b3;
    }

    .data td{
      text-align : left;
      padding-left : 15px;
    }

   

	</style>
</head>

<body>


	<div class="surat">
		
		<h4> Purchase Order </h4>


   <table class="data">

    <tr>
        <td> Vendor </td>
        <td> :  IZZI SOFT </td>
      </tr>


        <?php
          if(isset($_GET['po']) && ! empty($_GET['po'])){
            echo "<tr>";
              echo "<td> PO Number </td>";
              echo "<td>"." : ".$po."</td>";
            echo "</tr>";

          }
          else{ 
            echo "<tr>";
            echo "<td> Semua data PO </td>";
            echo "</tr>";
          }

        ?>

      
      <tr>
        <td> Tanggal </td>
        <td> :  2019-12-12        </td>
      </tr>

   

    </table>
    <br>

		<hr>
		

	

	<br>

		<table  border="1"  style="background : #f1f1f1;">
			<tr>
				<th style="width : 300px;" >Nama Barang</th>
				<th style="width : 15%;">Quantity</th>
				<th style="width : 15%;">Harga </th>
                <th style="width : 15%;" > Total </th>
			</tr>

      <?php
        if( ! empty($report)){
          foreach($report as $data){
            echo "<tr>";
              echo "<td style='width : 300px ; text-align:left ;  padding : 10px;'>".$data->nama_barang."</td>";
              echo "<td style='text-align:center ;  padding : 10px;'>".$data->qty_in."</td>";
              echo "<td  style='text-align:center ;  padding : 10px;'>".$data->harga."</td>";
              echo "<td  style='text-align:center ;  padding : 10px;'>".$data->total."</td>";
            echo "</tr>";
          }
        }
        ?>

		</table>

	</div>


</body>

</html>
