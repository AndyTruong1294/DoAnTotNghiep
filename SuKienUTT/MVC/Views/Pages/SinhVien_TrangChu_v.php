<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ sinh viên</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Public/Css/home.css">
    <style>
        h5 {
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="calendar-box">
            <div class="calendar-container">
                <div class="event-display">
                    <h5 id="Title">Chọn ngày để xem</h5>
                    <h5 id="selectedDateTitle" name="selectedDateTitle"></h5>
                </div>
                <div class="calendar-header">
                    <select id="monthSelect"></select>
                    <select id="yearSelect"></select>
                    <button type="button" class="btn btn-primary">Primary</button>
                </div>
                <table id="calendarTable">
                    <thead>
                        <tr>
                            <th>CN</th><th>T2</th><th>T3</th><th>T4</th><th>T5</th><th>T6</th><th>T7</th>
                        </tr>
                    </thead>
                    <tbody id="calendarBody">
                    </tbody>
                </table>
            </div>
        </div>

        <div class="table-box">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Sự kiện</th>
                        <th>Ngày diễn ra</th>
                        <th>Địa điểm</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Hội thảo công nghệ</td>
                        <td>15/09/2024</td>
                        <td>Phòng hội thảo A</td>
                        <td>
                            <a href="<?php echo BASE_URL ?>Event_information">Xem chi tiết</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const monthSelect = document.getElementById("monthSelect");
        const yearSelect = document.getElementById("yearSelect");
        const calendarBody = document.getElementById("calendarBody");

        const months = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", 
                        "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];

        // Khởi tạo dropdown tháng và năm
        function initSelectors() {
            months.forEach((m, i) => {
                let opt = new Option(m, i);
                monthSelect.add(opt);
            });

            let currentYear = new Date().getFullYear();
            for (let i = currentYear - 50; i <= currentYear + 50; i++) {
                let opt = new Option(i, i);
                yearSelect.add(opt);
            }

            monthSelect.value = new Date().getMonth();
            yearSelect.value = currentYear;
        }

        // Lắng nghe sự kiện thay đổi
        monthSelect.onchange = renderCalendar;
        yearSelect.onchange = renderCalendar;

        // Chạy lần đầu
        initSelectors();
        renderCalendar();

        function renderCalendar() {
            let month = parseInt(monthSelect.value);
            let year = parseInt(yearSelect.value);
            const titleDisplay = document.getElementById("Title");
            const dateDisplay = document.getElementById("selectedDateTitle");

            calendarBody.innerHTML = ""; 

            let firstDay = new Date(year, month, 1).getDay();
            let daysInMonth = new Date(year, month + 1, 0).getDate();

            let date = 1;
            for (let i = 0; i < 6; i++) {
                let row = document.createElement("tr");

                for (let j = 0; j < 7; j++) {
                    let cell = document.createElement("td");
                    
                    if (i === 0 && j < firstDay) {
                        cell.innerHTML = "";
                    } else if (date > daysInMonth) {
                        break;
                    } else {
                        let dayNumber = date; // Cố định giá trị date trong closure
                        cell.innerHTML = dayNumber;

                        // Highlight ngày hiện tại (hôm nay)
                        if (dayNumber === new Date().getDate() && 
                            year === new Date().getFullYear() && 
                            month === new Date().getMonth()) {
                            cell.classList.add("today");
                        }

                        // --- SỰ KIỆN CLICK VÀO NGÀY ---
                        cell.onclick = function() {
                            // 1. Xóa class 'selected' ở tất cả các ô khác
                            const allCells = calendarBody.querySelectorAll("td");
                            allCells.forEach(td => td.classList.remove("selected"));

                            // 2. Thêm class 'selected' vào ô vừa click
                            this.classList.add("selected");

                            // 3. Thay đổi tiêu đề tương ứng
                            // Lưu ý: month + 1 vì trong JS tháng chạy từ 0-11
                            titleDisplay.innerText = `Đang xem ngày `;
                            dateDisplay.innerText = `${dayNumber}/${month + 1}/${year}`;
                            
                            // Bạn có thể gọi thêm hàm lấy dữ liệu từ database/API tại đây
                            console.log(`Đang xem ngày: ${dayNumber}-${month + 1}-${year}`);
                        };

                        date++;
                    }
                    row.appendChild(cell);
                }
                calendarBody.appendChild(row);
                if (date > daysInMonth) break;
            }
        }

        // Chạy khởi tạo
        initSelectors();
        renderCalendar();
    </script>

</body>
</html>