<?php
defined('BASEPATH') OR exit ('No direct script access allowed');



class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin)) {
            $this->session->set_flashdata('msg', 'Sesi anda telah berakhir');
            redirect(base_url().'admin/login/index');
        }
        $this->load->model('Admin_model');
        $this->load->model('Store_model');
        $this->load->model('Menu_model');
        $this->load->model('User_model');
        $this->load->model('Order_model');
        $this->load->model('Category_model');
    }
    public function index() {
        $data['countUser'] = $this->User_model->countUser();
        $data['countAdmin'] = $this->Admin_model->countAdmin();
        $data['countDish'] = $this->Menu_model->countDish();
        $data['countReady'] = $this->Menu_model->countReady();
        $data['countSoldout'] = $this->Menu_model->countSoldout();
        $data['countStore'] = $this->Store_model->countStore();
        $data['countOpen'] = $this->Store_model->countOpen();
        $data['countClose'] = $this->Store_model->countClose();
        $data['countCategory'] = $this->Category_model->countCategory();
        $data['countOrders'] = $this->Order_model->countOrders();
        $data['countPendingOrders'] = $this->Order_model->countPendingOrders();
        $data['countProcessOrders'] = $this->Order_model->countProcessOrders();
        $data['countDeliveringOrders'] = $this->Order_model->countDeliveringOrders();
        $data['countDeliveredOrders'] = $this->Order_model->countDeliveredOrders();
        $data['countRejectedOrders'] = $this->Order_model->countRejectedOrders();

        $resReport = $this->Admin_model->getResReport();
        $data['resReport'] = $resReport;

        $dishReport = $this->Admin_model->dishReport();
        $data['dishReport'] = $dishReport;

        $this->load->view('admin/body/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/body/footer');
    }

    public function resReport() {
        $resReport = $this->Admin_model->getResReport();
        $data['resReport'] = $resReport;
        $this->load->view('admin/reports/res_report', $data);
    }
    
    public function dishesReport() {
        $dishReport = $this->Admin_model->dishReport();
        $data['dishReport'] = $dishReport;
        $this->load->view('admin/reports/dish_report', $data);
    }

    public function usersReport() {
        echo "user";
    }

    public function ordersReport() {
        $resReport = $this->Admin_model->getResReport();
        $data['resReport'] = $resReport;

        $this->load->view('admin/body/header');
        $this->load->view('admin/reports/res_report', $data);
        $this->load->view('admin/body/footer');
    }
    public function generate_pdf($id) {
        //load pdf library
        $this->load->library('Pdf');
        
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('www.satemasseno.com');
        $pdf->SetTitle('Report');
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');
    
        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
        // set font
        $pdf->SetFont('helvetica', 12);
        
        // ---------------------------------------------------------
        
        
        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="0.1" cellpadding="2" cellspacing="0.1">'
        );
        
        if($id == 1) {
            $this->table->set_template($template);
            $resReport = $this->Admin_model->getResReport();
            $this->table->set_heading('Kode Cab Resto', 'Nama Cab Resto', 'Total Pendapatan');
            foreach ($resReport as $sf):
                $nama = "CAB";
                $kode = $sf->id_cr;
                $kode = sprintf("%03d", $kode);
                $this->table->add_row($nama.$kode, $sf->nama_cr, 'Rp'.number_format("$sf->harga",2,",","."));
            endforeach; 

        } else if($id == 2) {
            $this->table->set_template($template);
            $dishReport = $this->Admin_model->dishReport();
            $this->table->set_heading('Kode Menu', 'Nama Menu', 'Total Penjualan');
            foreach ($dishReport as $sf):
                $nama = "MNU";
                $kode = $sf->id_cr;
                $kode2 = $sf->id_pm;
                $kode = sprintf("%03d", $kode);
                $kode2 = sprintf("%03d", $kode2);
                $this->table->add_row($nama.$kode.$kode2, $sf->nama_pm, $sf->qty);
            endforeach;
            
        } else {
            redirect(base_url(). 'admin/home');
        }
        
        $html = $this->table->generate();
        //Generate HTML table data from MySQL - end
        
        // add a page
        $pdf->AddPage();
        
        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // reset pointer to the last page
        $pdf->lastPage();
    
        //Close and output PDF document
        $pdf->Output(md5(time()).'.pdf', 'I');
    }
}
