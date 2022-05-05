<!--E.A.C.C.Edirisinghe. 2022-05-05-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .main-table{
            margin: auto;
        }
        .main-table thead tr th{
            text-align: center;
        }
        .text-center{
            text-align: center;
        }
    </style>
</head>
<body>
<table class="main-table" border="1" cellpadding="2" cellspacing="0">
    <thead>
    <tr>
        <th>#</th>
        <th>title</th>
        <th>author</th>
        <th>year</th>
        <th>price</th>
    </tr>
    </thead>

    <tbody id="tbody"></tbody>
</table>
<div class="text-center">
<button  onclick="loadData()">Load</button>
</div>
</body>
</html>

<script>
    const loadData = () => {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'xml.php', true);
        xhr.onload = function (res) {
            if (this.status === 200) {
                buildTable(xhr.responseXML);
            }
        }
        xhr.send();
    }

    const buildTable = (xmlobj) => {
        const refTbody = document.getElementById('tbody');
        const xmlBook = xmlobj.getElementsByTagName('book');
        let count = refTbody.rows.length;
        for (let i = 0; i < xmlBook.length; i++) {
            const title = xmlobj.getElementsByTagName('title')[i].childNodes[0].nodeValue;
            const author = xmlobj.getElementsByTagName('author')[i].childNodes[0].nodeValue;
            const year = xmlobj.getElementsByTagName('year')[i].childNodes[0].nodeValue;
            const price = xmlobj.getElementsByTagName('price')[i].childNodes[0].nodeValue;
            const tr = `<tr>
                <td>${++count}</td>
                <td>${title}</td>
                <td>${author}</td>
                <td>${year}</td>
                <td>${price}</td>
                </tr>`;
            const newRow = refTbody.insertRow(refTbody.rows.length);
            newRow.innerHTML = tr;
        }
    }

</script>