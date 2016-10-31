<?php
class PDF extends FPDF
{
	//Page header
	function Header()
	{							
	}

	function Content($data)
	{
			$image1 = "asset/asset_default/Images/logo.jpg";
			$this->setFont('Arial','B',10);
			$this->Cell( 40, 40, $this->Image($image1, $this->GetX(), $this->GetY(), 20.28), 0, 0, 'L', false );
			$this->setFillColor(255,255,255);
			// Move to the right
	    						$this->Cell(40);
									$this->cell(30,6,"STRADA SANTO THOMAS AQUINO",0,1,'C',1);
	    						$this->Cell(80);
									$this->cell(30,6,"JADWAL UJIAN",0,1,'C',1);
								$this->Line(10,22,200,22);
								$this->Line(10,22,200,22);
			$this->Ln(5);
			$space_left = 30;
			$this->setFont('Arial','',10);
            $this->setFillColor(255,255,255);
            $this->cell($space_left,5,'Nama Lengkap',0,0,'L',0);
            $this->cell(10);
            $this->cell(2,5,':',0,0,'L',0);
            $this->cell(10);
            $this->cell(36,5,$data['user']['full_name'],0,1,'L',1);
            if($data['permission'] == 3){
            $this->cell($space_left,10,'NIS',0,0,'L',0);
            $this->cell(10);
            $this->cell(2,10,':',0,0,'L',0);
            $this->cell(10);
            $this->cell(36,10,$data['user']['username'],0,1,'L',1);
        	}
            $this->setFillColor(230,230,200);
            $this->cell(40,6,'Subject',1,0,'C',1);
			$this->cell(60,6,'Date',1,0,'C',1);
			$this->cell(35,6,'Hour',1,0,'C',1);
			$this->cell(50,6,'Classroom',1,1,'C',1);
			if($data['schedule']!=FALSE){
				foreach ($data['schedule'] as $rows) {
					$this->setFillColor(255,255,255);
					$this->cell(40,6,$rows->subject,1,0,'L',1);
					$this->cell(60,6,date('D, d M Y',strtotime($rows->date_schedule)),1,0,'L',1);
					$this->cell(35,6,date('H.i',strtotime($rows->hour_start))." - ".date('H:i',strtotime($rows->hour_end)),1,0,'L',1);
					$this->cell(50,6,$rows->name_classroom,1,1,'L',1);
				}
			}
	}
	function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),210,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','I',9);
                $this->Cell(0,10,'copyright Strada ' . date('Y'),0,0,'L');
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($data);
$pdf->Output('','Jadwal Ujian '.date('YmdHis').'.pdf');
