<?php
namespace site\controllers\testwork;


class Testwork
{
    function getJsonFromFile($path)
    {
        $file = file_get_contents($path);
        $objects = json_decode($file);
        unset($file);
        return $objects;
    }

    function action_testwork_form1()
    {
        $data = [];
        return ['view' => 'testwork/form1', 'data' => $data];
    }

    function action_testwork_form1Handling()
    {
        $data = [];
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $fullName = $_POST['fullName'];
            $address = $_POST['address'];
            $asus = intval($_POST['asus']);
            $lenovo = intval($_POST['lenovo']);
            if (!preg_match('/^[-0-9a-z_\.]+@[-0-9a-z^\.]+\.[a-z]{2,4}$/i', $email)) {
                echo "Wrong email!";
            } else if (!preg_match('/^[\p{Cyrillic}\p{Common}]+$/u', $fullName)) {
                echo "Cyrillic Full Name!";
            } else if (!preg_match('/^[\p{Cyrillic}\p{Common}]+$/u', $address)) {
                echo "Cyrillic address!";
            } else if (($asus <= 0) || ($lenovo <= 0)) {
                echo "You can't use negative numbers or you're using not a number";
            } else {
                $orderObjects = $this->getJsonFromFile("/Users/amirgolden/PhpstormProjects/Testwork_2/src/site/data/sales_receipt.json");
                $orderObjects[] = array('email' => $email, 'fullName' => $fullName, 'address' => $address, 'asus' => $asus, 'lenovo' => $lenovo);
                file_put_contents("/Users/amirgolden/PhpstormProjects/Testwork_2/src/site/data/sales_receipt.json", json_encode($orderObjects, JSON_UNESCAPED_UNICODE));
                unset($orderObjects);
                return ['view' => 'testwork/final', 'data' => $data];
            }
        }
        return ['view' => 'testwork/error', 'data' => $data];
    }

    function action_testwork_showTheCheck()
    {
        $orderObjects = $this->getJsonFromFile("/Users/amirgolden/PhpstormProjects/Testwork_2/src/site/data/sales_receipt.json");
        $data = $orderObjects;
        return ['view' => 'testwork/check', 'data' => $data];
    }
}