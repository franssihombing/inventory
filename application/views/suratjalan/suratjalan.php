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
		}


		hr {
			height: 2px;
			background: #000;
			width: 100%;
		}

    th{
      height : 30px;
    }

    .data td{
      text-align : left;
    }

    td{
      text-align : center;
    }


	</style>
</head>

<body>


	<div class="surat">
		
		<h4> SURAT JALAN </h4>

		<hr>
		

		<table class="data">
        <?php
          if(isset($_GET['so']) && ! empty($_GET['so'])){
            echo "<tr>";
              echo "<td> So Number </td>";
              echo "<td>"." : ".$so."</td>";
            echo "</tr>";

          }
          else{ 
            echo "<tr>";
            echo "<td> Semua data surat jalan </td>";
            echo "</tr>";
          }

        ?>

      
      <tr>
        <td> Tanggal </td>
        <td> :  2019-12-12        </td>
      </tr>

      <tr>
        <td> Pemohon </td>
        <td> :  Fransiscus Sihombing </td>
      </tr>

    </table>

	<br>

		<table border="1">
			<tr>
				<th style="width : 15%;">No</th>
				<th style="width : 350px;" >Nama Barang</th>
				<th style="width : 15%;">Quantity</th>
				<th style="width : 15%;">Satuan </th>
			</tr>

      <?php
        if( ! empty($report)){
          $no = 1;
          foreach($report as $data){
            echo "<tr>";
              echo "<td>".$no."</td>";
              echo "<td style='width : 350px ; text-align:left'>".$data->nama_barang."</td>";
              echo "<td>".$data->qty_out."</td>";
              echo "<td>".$data->satuan."</td>";
            echo "</tr>";
            $no++;
          }
        }
        ?>

		</table>

		<p></p>

	</div>


</body>

</html>
