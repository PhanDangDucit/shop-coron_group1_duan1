const revenues = JSON.stringify([
    {"doanh_thu":"16690000","thang":"3","nam":"2022"},
    {"doanh_thu":"108000000","thang":"5","nam":"2022"},
    {"doanh_thu":"17450000","thang":"8","nam":"2022"},
    {"doanh_thu":"26170000","thang":"3","nam":"2023"},
    {"doanh_thu":"23670000","thang":"3","nam":"2024"}
]);


const year = 2022;
const arr_month = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

function formatData(revenues, year) {
    const datas = [];
    const values = [];
    let value = 0;
    let last_value = 0;
    revenues.map((revenue) => {
        if(revenue.nam == year) {
            value = revenue.thang;
            if(values.length != 0) {
                last_value = Number(values[values.length - 1]);
            }
            for (var i = last_value + 1; i <= value; i++) {
                if(i != value) {
                    datas.push({
                        month: i,
                        revenue: 0
                    });
                }
            }
            datas.push({
                month: Number(revenue.thang),
                revenue: Number(revenue.doanh_thu)
            });
            values.push(value);
            last_value = Number(values[values.length - 1]);
        }
    })
    for(var i = last_value + 1; i <= 12; i++) {
        datas.push({
            month: i,
            revenue: 0
        });
    }
    return datas;
}


var datas = formatData(JSON.parse(revenues), year);

console.log("datas: ", datas);