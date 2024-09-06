</head>
<title>Data Cyklistů</title>
<style>
  body { font-family: DejaVu Sans, sans-serif; }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<span class="header">
    Data Cyklistů
</span>
<table class="table">
    <thead>
        <tr>
            <th >ID</th>
            <th >Křestní jméno</th>
            <th >Přijmení</th>
            <th >Datum narození</th>
            <th >Místo narození</th>
            <th >Váha </th>
            <th >Výška</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
            <td >{{ $item->id }}</td>
            <td >{{ $item->first_name }}</td>
                <td >{{ $item->last_name }}</td>
                <td >{{ $item->date_of_birth }}</td>
                <td >{{ $item->place_of_birth }}</td>
                <td >{{ $item->weight}}</td>
                <td >{{ $item->height }}</td>
              
            </tr>
        @endforeach
    </tbody>
    
</table>
<img
        src="https://static.wikia.nocookie.net/silly-cat/images/b/b8/War_of_the_Silly_and_Unsilly.jpg/revision/latest/thumbnail/width/360/height/360?cb=20240310230516"
        alt="" style="width: 250px; height: 250px;"/> </td>
</body>

