@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.candidate.management'))

@section('after-styles-end')
    {{ Html::style("css/crecursos/plugin/datatables/dataTables.bootstrap.min.css") }}
    <style type="text/css">
       #calendar {
        width: 141px;
        padding: 0;
        margin-top: 400px;
        border-left: 1px solid #A2ADBC;
        font: normal 12px/20px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
        color: #616B76;
        text-align: center;
        background-color: #fff;
        }
        .nav, .nav a {
        font: bold 18px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
        color: #fff;
        text-align: center;
        text-decoration: none;
        }
        caption {
        margin: 0;
        padding: 0;
        width: 141px;
        background: #A2ADBC;
        color: #fff;
        font: bold 12px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
        text-align: center;
        }
        th {
        font: bold 11px/20px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
        color: #616B76;
        background: #D9E2E1;
        border-right: 1px solid #A2ADBC;
        border-bottom: 1px solid #A2ADBC;
        border-top: 1px solid #A2ADBC;
        }
        .today, td.today a, td.today a:link, td.today a:visited {
        color: #F6F4DA;
        font-weight: bold;
        background: #DF9496;
        }
        td {
        border-right: 1px solid #A2ADBC;
        border-bottom: 1px solid #A2ADBC;
        width: 20px;
        height: 20px;
        text-align: center;
        background: url(images/bg_calendar.gif) no-repeat right bottom;
        }
        td a {
        text-decoration: none;
        font-weight: bold;
        display: block;
        }
        td a:link, td a:visited {
        color: #608194;
        background: url(images/bg_calendar.gif) no-repeat;
        }
        td a:hover, td a:active {
        color: #6aa3ae;
        background: url(images/bg_calendar.gif) no-repeat right top;
        }
        #calendar {

        width: 141px;

        padding: 0;

        margin: 0;

        border-left: 1px solid #A2ADBC;

        font: normal 12px/20px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;

        color: #616B76;

        text-align: center;

        background-color: #fff;

        }

        .nav, .nav a {

        font: bold 18px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;

        color: #fff;

        text-align: center;

        text-decoration: none;

        }

        caption {

        margin: 0;

        padding: 0;

        width: 141px;

        background: #A2ADBC;

        color: #fff;

        font: bold 12px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;

        text-align: center;

        }
        th {
        font: bold 11px/20px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
        color: #616B76;
        background: #D9E2E1;
        border-right: 1px solid #A2ADBC;
        border-bottom: 1px solid #A2ADBC;
        border-top: 1px solid #A2ADBC;
       }
        .today, td.today a, td.today a:link, td.today a:visited {
        color: #F6F4DA;
        font-weight: bold;
        background: #DF9496;
        }
        td {
        border-right: 1px solid #A2ADBC;
        border-bottom: 1px solid #A2ADBC;
        width: 20px;
        height: 20px;
        text-align: center;
        background: url(images/bg_calendar.gif) no-repeat right bottom;
        }
        td a {
        text-decoration: none;
        font-weight: bold;
        display: block;
        }
        td a:link, td a:visited {
        color: #608194;
        background: url(images/bg_calendar.gif) no-repeat;
        }
        td a:hover, td a:active {
        color: #6aa3ae;
        background: url(images/bg_calendar.gif) no-repeat right top;
        }

    </style>
@stop

@section('page-header')
    <h1>{{ trans('labels.crecursos.access.candidate.management') }}</h1>
@endsection

@section('content')
<table id="calendar" cellspacing="0" cellpadding="0" summary="This month's calendar">

<caption><a href="#" title="previous month" class="nav">&laquo;</a> Marzo <a href="#" title=siguiente mes" class="nav">&raquo;</a></caption>
<tr>
    <th scope="col" abbr="Sunday" title="Sunday">S</th>
    <th scope="col" abbr="Monday" title="Monday">M</th>
    <th scope="col" abbr="Tuesday" title="Tuesday">T</th>
    <th scope="col" abbr="Wednesday" title="Wednesday">W</th>
    <th scope="col" abbr="Thursday" title="Thursday">T</th>
    <th scope="col" abbr="Friday" title="Friday">F</th>
    <th scope="col" abbr="Saturday" title="Saturday">S</th>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>4</td>
    <td>5</td>
</tr>
<tr>
    <td class="today"><a href="#">6</a></td>
    <td>7</td>
    <td>8</td>
    <td>9</td>
    <td><a href="#">10</a></td>
    <td>11</td>
    <td>12</td>
</tr>
<tr>
    <td><a href="#">13</a></td>
    <td>14</td>
    <td>15</td>
    <td>16</td>
    <td>17</td>
    <td>18</td>
    <td>19</td>
</tr>
<tr>
    <td>20</td>
    <td>21</td>
    <td>22</td>
    <td><a href="#">23</a></td>
    <td>24</td>
    <td>25</td>
    <td>26</td>
</tr>
<tr>
    <td>27</td>
    <td>28</td>
    <td>29</td>
    <td>30</td>
    <td>31</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
</table>  
@stop

