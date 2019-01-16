<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Study Result</title>
    <style>
        body {
            padding: 0;
            margin: 0;
        }

        .page {
            max-width: 80em;
            margin: 0 auto;
        }

        table th,
        table td {
            text-align: left;
        }

        table.layout {
            width: 100%;
            border-collapse: collapse;
        }

        table.display {
            margin: 1em 0;
        }

        table.display th,
        table.display td {
            border: 1px solid #B3BFAA;
            padding: .5em 1em;
        }

        table.display th {
            background: #D5E0CC;
        }

        table.display td {
            background: #fff;
        }

        table.responsive-table {
            box-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);
        }

        .listcust {
            margin: 0;
            padding: 0;
            list-style: none;
            display: table;
            border-spacing: 10px;
            border-collapse: separate;
            list-style-type: none;
        }

        .customer {
            padding-left: 600px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Study Result</h2>
        <h3 class="box-title">Classroom Code : {{$value->ClassroomsDetails->Classrooms->classroom_code}} </h3><br>
                <h3 class="box-title">Classroom : {{$value->ClassroomsDetails->Classrooms->classroom_name}} </h3><br>
                <h3 class="box-title">Subject : {{$value->ClassroomsDetails->AcademicSubjects->academic_subjects_name}} </h3><br>
                <h3 class="box-title">Teacher : {{$value->ClassroomsDetails->Teachers->teacher_name}} </h3>
    </div>
    {{--
    <div class="customer">
        <table>
            <tr>
                <th>Nama Pelanggan</th>
                <td>:</td>
                <td>{{ $order->customer->name }}</td>
            </tr>
            <tr>
                <th>No Telp</th>
                <td>:</td>
                <td>{{ $order->customer->phone }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>:</td>
                <td>{{ $order->customer->address }}</td>
            </tr>
        </table>
    </div> --}}
    <div class="page">
        <table class="layout display responsive-table">
            <thead>
                    <tr>
                            
                            <th>Student Name</th>
                            <th>Daily Assignment</th>
                            <th>Mid-Test</th>
                            <th>Final Test</th>
                            <th>Results</th>
                          </tr>
                        </thead>
                        <tbody>
                           
                          
                          <tr>
                            
                            <td>{{$value->Students->student_name}}</td>
                            <td>{{$value->Tugas}}</td>
                            <td>{{$value->UTS}}</td>
                            <td>{{$value->UAS}}</td>
                            <td>{{$value->Hasil}}</td>
                          </tr>    
                         
      
      
                          
            </tbody>
        </table>
    </div>
</body>

</html>