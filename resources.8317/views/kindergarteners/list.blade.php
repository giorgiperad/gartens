@extends('layouts.app')

@section('content')

<div class="px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
  <div class="mb-6">
    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white tracking-tight">აღსაზრდელი</h1>
  </div>

<section class="content">
  <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-xl overflow-hidden">
    <div class="px-4 sm:px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
      <h3 class="text-lg font-bold text-gray-900 dark:text-white">აღსაზრდელების ჩამონათვალი</h3>
      <div>
        <button 
          type="submit" onclick="location.href = '{{ route('kindergarteners.show') }}'" class="bg-indigo-700 hover:bg-indigo-800 text-white font-medium px-4 py-2 rounded-lg shadow transition-all text-sm">
              <i class="fas fa-shield-alt mr-2"></i> დამატება
          </button>
      </div>
    </div>

    <div class="p-4 sm:p-6 overflow-x-auto">
      {!! Form::model($model, ['route' => 'kindergarteners.order']) !!}
      <div style="display: none;" id="checkbox-section"></div>
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">

        <div>
          <div class="form-group">
            <div>
              <input id="searchable" type="text" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-700 focus:border-indigo-700" placeholder="ძებნა" >
            </div>
          </div>
        </div>

        <div>
          <select name="action" id="cars-select" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-700 focus:border-indigo-700" onchange="updateModels()">
            <option value="" selected>მოქმედება -------></option>
          </select> 
        </div>

        <div>
          <select name="destination" id="models-select" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-700 focus:border-indigo-700">
            <option value="" selected><------- შედეგი</option>
          </select>
        </div>

        <div><button type="submit" class="w-full bg-indigo-700 hover:bg-indigo-800 text-white font-medium px-4 py-2 rounded-lg shadow transition-all">შესრულება</button></div>
      </div>
      {!! Form::close() !!}   

      <table class="w-full" id="table" ></table>
    </div>
  </div>
</section>
</div>
@endsection

@push('scripts')

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/sl-1.2.5/datatables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/js/dataTables.checkboxes.js"></script>

<script>

var carsSelect = document.getElementById('cars-select');
var modelsSelect = document.getElementById('models-select');

function createCar(name, id) { return { name: name,id: id } }
function createModel(name, id, car) { return { name: name, id: id, car: car } }

function removeOptions(select) {
  while (select.options.length > 1) { select.remove(1); }
  select.value = "";
}
function addOptions(select, options) {
  options.forEach(function(option) {
    select.options.add(new Option(option.name, option.id));
  });
}
var cars = [
  createCar('პრიორიტეტის', '1'),
  createCar('სტატუსის შეცვლა', '2')
];

var models = [
  createModel('დასტურის გაუქმება', '0', '1'),
  createModel('დადასტურება', '1', '1'),
  createModel('მომლოდინეთ', '1', '2'),
  createModel('აქტიურით', '2', '2'),
  createModel('გასულით', '4', '2')
];

function updateModels() {
  var selectedCar = carsSelect.value;
  var options = models.filter(function(model) {
    return model.car === selectedCar;
  });
  removeOptions(modelsSelect);
  addOptions(modelsSelect, options);
}

addOptions(carsSelect, cars);

var app = @json($model);

const datatable = $('#table').DataTable({
  "ordering": true,
  "info": false,
  "autoWidth": false,
  "responsive": true,
  "lengthChange": false,
  fixedColumns: true,
  data: app,
  "order": [[ 0, "desc" ]],
  columnDefs: [
    { targets: 0, visible: false },
    { title: 'მუნიც...', targets: 1 },
    { title: 'ბაღი', targets: 2 },
    { title: 'ასაკი', targets: 3 },
    { title: 'პრიორიტეტი', targets: 4 },
    { title: 'სტატუსი', targets: 5 },
    { title: 'ბავშვის N:', targets: 6 },
    { title: 'დედის N:', targets: 7 },
    { title: 'ბავშვი', targets: 8 },
    { title: 'დაბადების თარიღი', targets: 9 },   // 👈 დამატებული სვეტი
    { title: 'თარიღი', targets: 10 },
    {
      'targets': 11,
      'checkboxes': {
        'selectRow': true,
        stateSave: false
      }
    },
    { title: 'მოქმედება', targets: 12 }
  ],
  'select': {
    'style': 'multi',
    selector: 'td.dt-checkboxes-cell'
  },
  createdRow: function (row, data, index) {
    if (data.active_status.id == 4) { row.style.backgroundColor = '#ccc';  row.style.color = '#fff'; }
    else if (data.active_status.id == 3) { row.style.backgroundColor = '#19712d'; row.style.color = '#fff'; }
  },
  columns: [
    { data: 'id' },
    { render: (d,t,row) => row.municipality?.name ?? '---' },
    { data: 'kindergarten.name' },
    { render: (d,t,row) => row.group_range ? row.group_range.range : '---' },
    { render: (d,t,row) => row.priority 
        ? `<span class="badge badge-${row.priority.has_permission ? 'success' : 'danger'}">
             ${row.priority.has_permission ? 'დადასტურებული <i class="icon fas fa-check"></i>' : 'დაუდასტურებელი' }
           </span>`
        : '<span class="badge badge-primary">არ სარგებლობს</span>'
    },
    { render: (d,t,row) => row.active_status.name },
    { data: 'kids_personal_number' },
    { data: 'mother_personal_number' },
    { render: (d,t,row) => `${row.kids_first_name} ${row.kids_last_name}` },
    { render: (d,t,row) => row.birth_date ? row.birth_date : '---' }, // 👈 ახალი სვეტი
    { data: 'created_at' },
    { data: 'id', className: 'text-left' },
    {
      data: null,
      className: "dt-center editor-edit",
      render: function ( data, type, row ) {
        const route = @json(route('kindergarteners.show'));
        const routeDelate = @json(route('kindergarteners.destroy'));
        return `${!row.graduate ? `<i style="cursor:pointer; margin-right:17px; color:black;" class="fas fa-edit" 
          onclick='letsRedirect(event, "${route}", ${row.id})'></i>` : ''}
                <i style="cursor:pointer; color:black;" class="fas fa-trash" 
                  onclick='nottify(event)' data-href="${routeDelate + '' + row.id}"></i>`
      },
      orderable: false
    }
  ]
});

let checkboxDiv = document.querySelector("#checkbox-section");

function createCheckbox (value) {
  let checkbox = document.createElement('input');
  checkbox.type = "checkbox";
  checkbox.name = "ids[]";
  checkbox.value = value;
  checkbox.checked = true;
  checkboxDiv.appendChild(checkbox);
}

$(document).on("change", "input[type='checkbox']", function() {
  var rows_selected = datatable.column(11).checkboxes.selected();
  checkboxDiv.innerHTML = "";
  rows_selected.map(function(value) {
    createCheckbox(value);
  })
})

function letsRedirect (event, link, id) {
  event.preventDefault()
  document.querySelectorAll("tr").forEach((elm) => { elm.classList.remove('selected') })
  document.querySelectorAll("input").forEach((elm) => { elm.checked = false })
  return location.href = link + '/' + id;
}

$('#searchable').keyup(function () {
  datatable.search($(this).val()).draw();
});

$('.dataTables_filter').css('display', 'none');

</script>
@endpush

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/css/dataTables.checkboxes.css">

<style>
  table.dataTable tbody>tr.selected, table.dataTable tbody>tr>.selected { background-color: #B0BED9; }
</style>
@endpush
