<?php

// $arr = array({
//     'id' => 3,
//     'name' => '时尚洋装连衣裙',
//     'tb' => 'https://item.taobao.com/item.htm?id=594352164056',
//     'wx' => 'https://mp.weixin.qq.com/s/wsIk3J0NxI-2VCAua-_0Lg',
//     'img' => 'https://img.alicdn.com/imgextra/i3/173939715/O1CN01RYIT232LdWJ7Q51pH_!!173939715.jpg',
//     'video' => ''}

// );

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "item";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$sql = "SELECT * FROM subitem ORDER BY id;";
$result = $conn->query($sql);
$arr1;
$arr="";
if ($result->num_rows > 0) {
    // 输出数据

    //var_dump($result->fetch_assoc());
    while ($row = $result->fetch_assoc()) {
        //$i=0;
       // echo "id: " . $row["Id"]. " - Name: " . $row["name"]. " " . $row["tb"]. "<br>";
        //var_dump($row);
        $arr = $arr.'{ "id": "'.$row["id"].'","name": "'.$row["name"].'","tb": "'.$row["tb"].'","wx": "'.$row["wx"].'","img": "'.$row["img"].'"},';
        //, "video": "" 
        //array_push($arr,$arr);

        $arr1 = $row;
       
        // echo '<script>Item.push(' . json_encode($row) . '); 
        // //setTimeout(reflashQRcode, 1000);
        // //reflashQRcode();
        // </script>';
    }
} else {
    echo "0 结果";
}
$conn->close();

//array_push($arr,$arr);
// $arr1 =  json_encode($arr1);
// $arr = substr($arr,1,strlen($arr)-1); 
// $newstr = "{id".$newstr;
// echo $arr1;
//echo json_encode($arr);
echo "[".substr($arr,0,strlen($arr)-1)."]";





// echo '<script>Item.push(' . json_encode($arr) . '); 
// setTimeout(reflashQRcode, 1000);
// //reflashQRcode();
// </script>';



?>