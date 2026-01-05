<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fix extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        echo "Fixer is ready. Go to /fix/rtl to fix Chinese/Indonesian font issues.";
    }

    public function rtl()
    {
        // Fix for Indonesian language erroneously set as RTL
        // 'active' column in 'languages' table means RTL status (1=RTL, 0=LTR)

        // 1. Fix by language name (folder name)
        $this->db->where('language', 'indonesian');
        $this->db->update('languages', ['active' => 0]);
        $affected1 = $this->db->affected_rows();

        // 2. Fix by short code just in case
        $this->db->where('short_code', 'id');
        $this->db->update('languages', ['active' => 0]);
        $affected2 = $this->db->affected_rows();

        if ($affected1 > 0 || $affected2 > 0) {
            echo "SUCCESS: Indonesian language set to LTR (No RTL). PDF Font should be normal now.";
        } else {
            echo "NOTICE: No changes made. Maybe it was already fixed or language not found?";
        }

        echo "<br>Check your PDF now.";
    }
}
