<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>能量管理系统</title>
</head>
<body>
    <div class="header">
        <div class="title">能量管理系统</div>
        <div class="modules">
            <div class="module " onclick="navigateToModule(1)">氢气系统</div>
            <div class="module" onclick="navigateToModule(2)">DC/DC</div>
            <div class="module " onclick="navigateToModule(3)">单片燃料电池</div>
            <div class="module" onclick="navigateToModule(4)">空压机</div>
            <div class="module active" onclick="navigateToModule(5)">燃料电池电堆</div>
            <div class="module" onclick="navigateToModule(6)">燃料电池发电机</div>
            <div class="module" onclick="navigateToModule(7)">热管理系统</div>
            <div class="module" onclick="navigateToModule(8)">实验室环境安全</div>
        </div>
        <div class="module-dropdown">
            <select id="moduleSelect" onchange="navigateToModule(this.value)">
                <option value="0">燃料电池电堆</option>
                <option value="1">氢气系统</option>
                <option value="2">DC/DC</option>
                <option value="3">单片燃料电池</option>
                <option value="4">空压机</option>
                <option value="5">燃料电池电堆</option>
                <option value="6">燃料电池发电机</option>
                <option value="7">热管理系统</option>
                <option value="8">实验室环境安全</option>
            </select>
        </div>
    </div>
    <div class="content">
        <div class="chart-box">
            <div class='chart_title'>氢气压力(Mpa)</div>
            <div id="chart1" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气流量(L/min)</div>
            <div id="chart2" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气温度(℃)</div>
            <div id="chart3" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气储存量(kg)</div>
            <div id="chart4" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气湿度(%)</div>
            <div id="chart5" class="chart"></div>
        </div>
        <div class="chart-box">
             <div class='chart_title'>氢气纯度(%)</div>
            <div id="chart6" class="chart"></div>
        </div>
    </div>
    <script src="../js/echarts.js"></script>
    <script src="../js/jquery.min.js"></script>
   <script src='./fifth.js'></script>
   <script>
        function navigateToModule(moduleNumber) {
            switch(moduleNumber){
                case 1:
                    window.location.href='../first/first.php';break;
                case 2:
                    window.location.href='../second/second.php';break;
                case 3:
                    window.location.href='../third/third.php';break;
                case 4:
                    window.location.href='../fourth/fourth.php';break;
                case 5:
                    window.location.href='../fifth/fifth.php';break;
                case 6:
                    window.location.href='../sixth/sixth.php';break;
                case 7:
                    window.location.href='../seventh/seventh.php';break;
                    case 8:
                    window.location.href='../eighth/eighth.php';break;
               
            }

            
}
const moduleSelect = document.getElementById('moduleSelect');

// 监听下拉框的选择事件
moduleSelect.addEventListener('change', function() {
    // 获取所选项的值
    const selectedModule = moduleSelect.value;

    // 根据选择项的值进行页面跳转
    if (selectedModule === "1") {
        window.location.href = "../first/first.php"; // 跳转到模块1页面
    } else if (selectedModule === "2") {
        window.location.href = "../second/second.php"; // 跳转到模块2页面
    }else if (selectedModule === "3") {
        window.location.href = "../third/third.php"; // 跳转到模块2页面
    }else if (selectedModule === "4") {
        window.location.href = "../fourth/fourth.php"; // 跳转到模块2页面
    }else if (selectedModule === "5") {
        window.location.href = "../fifth/fifth.php"; // 跳转到模块2页面
    }else if (selectedModule === "6") {
        window.location.href = "../sixth/sixth.php"; // 跳转到模块2页面
    }else if (selectedModule === "7") {
        window.location.href = "../seventh/seventh.php"; // 跳转到模块2页面
    }else if (selectedModule === "8") {
        window.location.href = "../eighth/eighth.php"; // 跳转到模块2页面
    }
    // 添加其他选项的跳转逻辑
});

    </script>
   
</body>
</html>
