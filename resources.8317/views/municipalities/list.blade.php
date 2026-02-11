@extends('layouts.app')

@section('content')

<div class="px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
  <div class="mb-6">
    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white tracking-tight">მუნიციპალიტეტი</h1>
  </div>

 <!-- Main content -->
 <section class="content">
  <!-- Default box -->
  <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-xl overflow-hidden">
    <div class="px-4 sm:px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
      <h3 class="text-lg font-bold text-gray-900 dark:text-white">მუნიციპალიტეტების ჩამონათვალი</h3>
      <div>
        <button 
          type="submit" onclick="location.href = '{{ route('municipalities.show') }}'" class="bg-indigo-700 hover:bg-indigo-800 text-white font-medium px-4 py-2 rounded-lg shadow transition-all text-sm">
            <i class="fas fa-shield-alt mr-2"></i> დამატება
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="overflow-x-auto">
      <table class="w-full">
        <thead class="bg-gray-100 dark:bg-gray-800">
          <tr>
            <th class="px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">ID</th>
            <th class="px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">მუნიციპალიტეტი</th>
            <th class="px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">რეგიონი</th>
            <th class="px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">თარიღი</th>
            <th class="px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">მოქმედება</th>
          </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
          @foreach ($model as $item)
           <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{$item->id}}</td>
            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{$item->name}}</td>
            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{$item->region->name}}</td>
            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{$item->created_at}}</td>
            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm">
              <button 
                type="button" 
                class="bg-indigo-700 hover:bg-indigo-800 text-white font-medium px-3 py-1.5 rounded-lg shadow transition-all text-sm mr-2" 
                onclick="location.href = '{{route('municipalities.show', ['id' => $item->id])}}'">
                  <i class="fas fa-shield-alt mr-1"></i> რედაქტირება
              </button>
              <button 
                type="button" 
                class="bg-red-600 hover:bg-red-700 text-white font-medium px-3 py-1.5 rounded-lg shadow transition-all text-sm"
                data-href="{{route('municipalities.destroy', ['id' => $item->id])}}"
                onclick="nottify(event)">
                  <i class="fas fa-shield-alt mr-1"></i> წაშლა
              </button>
            </td>
           </tr>
          @endforeach          
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</section>
</div>
@endsection

@push('scripts')
<script></script>
@endpush





