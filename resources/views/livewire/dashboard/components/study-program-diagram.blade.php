<div>
    <div class="apex-charts" id="study_program_chart" dir="ltr"></div>
</div>

@push('scripts')
    <script>
        var xDataStudyProgram = JSON.parse(`<?php echo $data; ?>`);
        let studyProgramOptions = {
            series: xDataStudyProgram.students_count,
            chart: {
                height: 332.5,
                type: "pie"
            },
            labels: xDataStudyProgram.studies_program,
            legend: {
                position: "bottom"
            },
            dataLabels: {
                dropShadow: {
                    enabled: !1
                }
            },
            colors: ["#ff7f41", "#f672a7", "#695eef"]
        };

        let studyProgramchart = new ApexCharts(document.querySelector("#study_program_chart"), studyProgramOptions)
            .render();
    </script>
@endpush
