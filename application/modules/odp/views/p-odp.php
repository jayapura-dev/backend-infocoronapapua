<script src="<?php echo base_url()?>assets\backend\js\jquery-1.11.3.min.js"></script>

<title><?php echo $title ?></title>
<script type="text/javascript">
	  $(document).ready(function() {
	    $("#cetak").click(function(event) {
	      event.preventDefault();
	      window.print();
	    });
	    $("#export_excel").click(function(event) {
	      event.preventDefault();
	      $("#container").btechco_excelexport({
	        containerid: "container",
	        datatype: $datatype.Table
	      });
	    });
			window.onload = function() { window.print(); }
	  });
</script>
<style type="text/css">
	body {
		margin: 0px;
		padding: 0px;
	}
	.title {
		text-align: center;
		font-family: Verdana;
		font-weight: bold;
		margin-bottom: 20px;
	}
	.table {
		border-collapse: collapse;
	}
	.table thead {
		font-size: 11px;
		font-weight: bold;
	}
	.table .header td{
		background-color: #FFF;
		text-align: center;
	}
	.table thead td {
		background-color: #EEEEEE;
	}
	.prog {
		background-color: #dddddd;
	}
	.table tr {
		border-collapse: collapse;
	}
	.table td{
		font-size: 12px;
		padding: 5px;
		border-collapse: collapse;
		border: thin solid black;
	}
	.gray {
		background-color: gray;
	}
	.green {
		background-color: green;
	}
	@media print
	{
		.no-print, .no-print *
		{
		    display: none !important;
		}
		body {
    background: none;
    -ms-zoom: 1.665;
  	}
	  div.portrait, div.landscape {
	    margin: 0;
	    padding: 0;
	    border: none;
	    background: none;
	  }
	  div.landscape {
	    transform: rotate(270deg) translate(-276mm, 0);
	    transform-origin: 0 0;
	  }
	}
	.box_export {
	    top: 0px;
	    right: 0px;
	    padding: 10px 0px 10px 0px;
	    background: gray;
	    height: 20px;
	    margin: 0px;
	    margin-bottom: 10px;
	  }
	  .box_export ul {
	    margin: 0px;
	    padding: 0px;
	  }
	  .box_export li {
	    display: inline;
	  }
	  .box_export li a {
	    color: white;
	    text-decoration: none;
	    padding: 0px 10px 0px 10px;
	  }
	  .box_export li a:hover {
	    background-color: green;
	  }
    .lg-text {
      font-size: 20px;
      padding: 5px;
      font-weight: bold;
    }
    .italic-text {
      font-size: 11px;
      font-style: italic;
      padding: 5px;
    }
    .profile-img{
        text-align: center;
    }
    .profile-img img{
        width: 70%;
        height: 100%;
    }
    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }
    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }

</style>

<div class="box_export no-print"><ul><li><a href="#" id="cetak">Print</a></li></ul></div>
<div id="container">

  	<div class="title">
  		<table width="100%">
  			<tr><td colspan='2' align='center'><text class="lg-text">PROVINSI PAPUA</text></td></tr>
  	  </table>
      <hr/>
      <table width="100%">
        <tr><td colspan='2' align='center'>DATA ORANG DALAM PANTAUAN</td></tr>
      </table>

  	</br>
  	<table width="100%" class="table" border="1px">
  		<thead>
		<tr class="header">
          <th class="text-center">NO</th>
          <th>KABUPATEN/KOTA</th>
          <th>NAMA</th>
          <th class="text-center">GENDER</th>
          <th class="text-center">UMUR</th>
          <th class="text-center">ALAMAT</th>
          <th class="text-center">KONTAK</th>
          <th class="text-center">MULAI DP</th>
          <th class="text-center">BERAHIR DP</th>
		  <th class="text-center">DATE CREATE</th>
        </tr>
  		</thead>
      <tbody>
        <?php
        $no = 1;
        foreach($odp as $item){ ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td class="text-uppercase"><?php echo $item->nama_kab ?></td>
            <td class="text-center"><?php echo $item->nama ?></td>
			<td class="text-center"><?php echo $item->gender ?></td>
            <td class="text-center"><?php echo $item->umur ?></td>
            <td class="text-center"><?php echo $item->alamat ?></td>
            <td class="text-center"><?php echo $item->no_kontak ?></td>
            <td class="text-center"><?php echo $item->mulai_dp ?></td>
            <td class="text-center"><?php echo $item->berahir_dp ?></td>
			<td class="text-center"><?php echo $item->date_created ?></td>
          </tr>
      <?php } ?>
      </tbody>
  	</table>
		
  </div>
</div>