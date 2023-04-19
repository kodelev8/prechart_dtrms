<?php
class excel_daily_task extends Secure_Controller
{
	function __construct() 
	{		
		parent::__construct();
		$this->load->model( array( 'mindex_daily_task','mglobal') );     
	}

	function index()
	{
		include ('system/excel/PHPExcel.php');					
		include('system/excel/PHPExcel/Writer/Excel5.php');
			
		$objPHPExcel = new PHPExcel();			
		$objPHPExcel->setActiveSheetIndex(0);
		
		$objPHPExcel->getActiveSheet()->setTitle("Sales Details");
		
		// Set default style
		$objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setName('Times New Roman');			
		
		// Set printing options
		$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A3);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
								
	
		//contents
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Name:Emerson Tiamzon');
		$objPHPExcel->getActiveSheet()->SetCellValue('A2', 'MARINE');
		$objPHPExcel->getActiveSheet()->SetCellValue('B2', 'SALES SUMMARY');
		
		$objPHPExcel->getActiveSheet()->SetCellValue('B3', 'Trans Marine (London) Limited');
		$objPHPExcel->getActiveSheet()->SetCellValue('B4', 'Units 59-60, Barking Industrial Park');
		$objPHPExcel->getActiveSheet()->SetCellValue('B5', 'Alfreds Way (Entrance Ripple Road)');
		$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Barking, Essex, IG11 0TJ');
		$objPHPExcel->getActiveSheet()->SetCellValue('B7', 'Telephone   +44 20 8594 9540/6513 (10 lines)');
		$objPHPExcel->getActiveSheet()->SetCellValue('B8', 'Fax             +44 20 8594 9495');
		$objPHPExcel->getActiveSheet()->SetCellValue('B9', 'E-mail         sales@trans-marine.com');
		$objPHPExcel->getActiveSheet()->SetCellValue('B10', 'Internet        http://www.trans-marine.com');

		$objPHPExcel->getActiveSheet()->SetCellValue('AQ3', 'Trans Marine (Rotterdam)');
		$objPHPExcel->getActiveSheet()->SetCellValue('AQ4', 'Baltrans Logistics');
		$objPHPExcel->getActiveSheet()->SetCellValue('AQ5', 'Van Maasdijkweg 15');
		$objPHPExcel->getActiveSheet()->SetCellValue('AQ6', '3088 EC Rotterdam');
		$objPHPExcel->getActiveSheet()->SetCellValue('AS7', 'Telephone');
		$objPHPExcel->getActiveSheet()->SetCellValue('AT7', '+31 10 283 3741');
		$objPHPExcel->getActiveSheet()->SetCellValue('AS8', 'Fax');
		$objPHPExcel->getActiveSheet()->SetCellValue('AT8', '+31 10 283 3750');

		
    	
    	$objPHPExcel->getActiveSheet()->SetCellValue('B17', 'Invoice Number');
		$objPHPExcel->getActiveSheet()->SetCellValue('C17', 'Job Number');
		$objPHPExcel->getActiveSheet()->SetCellValue('D17', 'Currency');
		$objPHPExcel->getActiveSheet()->SetCellValue('E17', 'Owner');
		$objPHPExcel->getActiveSheet()->SetCellValue('F17', 'Vessel');
		$objPHPExcel->getActiveSheet()->SetCellValue('G17', 'Invoice Date');
		$objPHPExcel->getActiveSheet()->SetCellValue('H17', 'Special/Urgent');
		$objPHPExcel->getActiveSheet()->SetCellValue('I17', 'Country');
		$objPHPExcel->getActiveSheet()->SetCellValue('J17', 'City');
		$objPHPExcel->getActiveSheet()->SetCellValue('K17', 'Airport Destination');
		$objPHPExcel->getActiveSheet()->SetCellValue('L17', 'Date');
		$objPHPExcel->getActiveSheet()->SetCellValue('M17', 'Departure Airport');
		$objPHPExcel->getActiveSheet()->SetCellValue('N17', 'Area');
		$objPHPExcel->getActiveSheet()->SetCellValue('O17', 'Agent');
		$objPHPExcel->getActiveSheet()->SetCellValue('P17', 'Order Nos');
		$objPHPExcel->getActiveSheet()->SetCellValue('Q17', 'Job');
		$objPHPExcel->getActiveSheet()->SetCellValue('R17', 'AWB No');
		$objPHPExcel->getActiveSheet()->SetCellValue('S17', 'Entries');
		$objPHPExcel->getActiveSheet()->SetCellValue('T17', 'Consolidated');
		$objPHPExcel->getActiveSheet()->SetCellValue('U17', 'Number of Pieces');
		$objPHPExcel->getActiveSheet()->SetCellValue('V17', 'Weight');
		$objPHPExcel->getActiveSheet()->SetCellValue('W17', 'Volume');
		$objPHPExcel->getActiveSheet()->SetCellValue('X17', 'Arrival Date');
		$objPHPExcel->getActiveSheet()->SetCellValue('Y17', 'Customs at Origin');
		$objPHPExcel->getActiveSheet()->SetCellValue('Z17', 'Fuel Surcharge');
		$objPHPExcel->getActiveSheet()->SetCellValue('AA17', 'Cost');
		$objPHPExcel->getActiveSheet()->SetCellValue('AB17', 'Discount');
		$objPHPExcel->getActiveSheet()->SetCellValue('AC17', 'VAT');
		$objPHPExcel->getActiveSheet()->SetCellValue('AD17', 'Amount');
		$objPHPExcel->getActiveSheet()->SetCellValue('AE17', 'Split');
		$objPHPExcel->getActiveSheet()->SetCellValue('AF17', 'Jobs Cost');
		$objPHPExcel->getActiveSheet()->SetCellValue('AG17', 'Profit');
		$objPHPExcel->getActiveSheet()->SetCellValue('AH17', 'Profit %');
		$objPHPExcel->getActiveSheet()->SetCellValue('AI17', 'Tender');
		$objPHPExcel->getActiveSheet()->SetCellValue('AJ17', 'DG.IATA.EXPRESS.SPLIT');
		$objPHPExcel->getActiveSheet()->SetCellValue('AK17', 'FUEL.DEMARG.RASCO');
		$objPHPExcel->getActiveSheet()->SetCellValue('AL17', 'Cost per Kilo');
		$objPHPExcel->getActiveSheet()->SetCellValue('AM17', 'Airline');
		$objPHPExcel->getActiveSheet()->SetCellValue('AN17', 'DRCT/TRANS');
		$objPHPExcel->getActiveSheet()->SetCellValue('AO17', 'CNSL/OWB');
		$objPHPExcel->getActiveSheet()->SetCellValue('AP17', 'Payment Date');
		$objPHPExcel->getActiveSheet()->SetCellValue('AQ17', 'Method of Payment');
		$objPHPExcel->getActiveSheet()->SetCellValue('AR17', 'Comments');
		$objPHPExcel->getActiveSheet()->SetCellValue('AS17', 'Client PO Number');
		$objPHPExcel->getActiveSheet()->SetCellValue('AT17', 'Date Posted/Sent');
  			

		// Rename sheet
		$objPHPExcel->getActiveSheet()->setTitle("Sales Details");
		
		// Save Excel 2003 file
		$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);			
					
		header("Content-type: application/excel");
		header("Content-Disposition: attachment; filename=SalesDetails.xls");
		header("Pragma: no-cache");			
		header("Expires: 0");

		//Flush excel file
		echo $objWriter->save('php://output');
	}		
}