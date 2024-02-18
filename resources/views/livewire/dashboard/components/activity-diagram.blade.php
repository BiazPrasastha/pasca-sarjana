<div>
    <div class="apex-charts" id="activity_chart" dir="ltr"></div>
</div>

@push('scripts')
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        var xDataActivity = JSON.parse(`<?php echo $data; ?>`);
        let activityOptions = {
            series: [{
                    name: 'Pengajuan Proposal',
                    data: xDataActivity.data_proposal
                },
                {
                    name: 'Plagiasi',
                    data: xDataActivity.data_plagiarism
                },
                {
                    name: 'Tesis',
                    data: xDataActivity.data_theses
                }
            ],
            chart: {
                type: "bar",
                height: 300,
                toolbar: {
                    show: !1
                }
            },
            plotOptions: {
                bar: {
                    vertical: !0,
                    dataLabels: {
                        position: "top"
                    }
                },
            },
            dataLabels: {
                enabled: !0,
                offsetX: 0,
                style: {
                    fontSize: "12px",
                    colors: ["#fff"]
                },
            },
            stroke: {
                show: !0,
                width: 1,
                colors: ["#fff"]
            },
            tooltip: {
                shared: !0,
                intersect: !1
            },
            xaxis: {
                categories: xDataActivity.month
            },
            colors: ["#ff7f41", "#f672a7", "#695eef"],
        }
        let activityChart = new ApexCharts(document.querySelector("#activity_chart"), activityOptions).render();
    </script>
@endpush
