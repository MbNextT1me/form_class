<?php

class Request_form
{
    public $flag;
    public $name = '';
    public $surname = '';
    public $email = '';
    public $phone = '';
    public $subject = '';
    public $payment = '';
    public $mailing = false;
    public $date = 0;
    public $ipaddr = '';

    protected static $resultfile = '../../forms_files/result.txt';

    public function __construct($data){
        if(is_array($data)) {
            $this->flag = 0;
            $this->name = $data['name'];
            $this->surname = $data['surname'];
            $this->email = $data['email'];
            $this->phone = $data['phone'];
            $this->subject = $data['subjects'];
            $this->payment = $data['payment'];
            $this->mailing = $data['mailing'];
            $this->date = date('l jS \of F Y h:i:s A');
            $this->ipaddr = $_SERVER['REMOTE_ADDR'];
        }
        else if (is_int($data) and $data == 0){
            return;
        }
    }


    protected function isDirExists(){
        $dir = dirname(static::$resultfile);
        if (!file_exists($dir)){
            mkdir($dir, 0700);
        }
    }

    public function save(){
        $this->isDirExists();
        $out = fopen(static::$resultfile, 'a');
        fputcsv($out, (array)$this);
        fclose($out);
        return true;
    }

    public function coutFile(){
        $counter = 1;
        $row = 1;
        if (($handle = fopen(static::$resultfile, "r")) !== FALSE) {
            while (($data = fgetcsv($handle)) !== FALSE) {
                $num = count($data);
                if($data[0] == 0) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='{$counter}'></td>";
                    $row++;
                    echo "<td>" . $counter . "</td>";
                    for ($c = 1; $c < $num; $c++) {
                        echo "<td>" . $data[$c] . "</td>";
                    }
                    $counter++;
                    echo "</tr>";
                }
            }
        }
    }

    public function dellRows($data) {
        $counter = 0;
        $del_lines = array();

        foreach ($data as $k=>$v) {
            $del_lines[$counter] = $k;
            $counter++;
        }

        $rows = file( static::$resultfile );
        $open=fopen(static::$resultfile,"w");
        $counter = 0;
        $flag = 0;
        foreach( $rows as $rowNr => $row ) {
            if ($row[0] != 0){
                fwrite($open,$row);
                $counter--;
            }
            else if(in_array($counter+1, $del_lines)){
                $row = substr_replace($row, $flag+1, 0, 1);
                fwrite($open,$row);
            }
            else {
                fwrite($open,$row);
            }
            $counter++;
            $flag++;
        }

        fclose($open);
    }
}