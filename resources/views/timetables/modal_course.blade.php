<div id="modalCourse" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display:none">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 bg-gray-500 opacity-75"></div>
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <form method="POST" id="lessonForm">
        @csrf
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="mb-4">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
              Dodaj zajęcia
            </h3>
          </div>
          <div class="grid grid-cols-1 gap-4">
            <div class="form-group" style="display:none">
              <label for="id_kursu" class="block text-sm font-medium text-gray-700">Id kursu</label>
              <input type="hidden" name="id_kursu" id="id_kursu" value="{{ $course->id }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="form-group" style="display:none">
              <label for="id_lekcji" class="block text-sm font-medium text-gray-700">Id lekcji</label>
              <input type="hidden" name="id_lekcji" id="id_lekcji" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="form-group">
              <label for="nazwa_zajec" class="block text-sm font-medium text-gray-700">Nazwa</label>
              <input type="text" name="nazwa_zajec" id="nazwa_zajec" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="form-group">
              <label for="opis_zajec" class="block text-sm font-medium text-gray-700">Opis</label>
              <textarea name="opis_zajec" id="opis_zajec" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
            </div>
            <div class="form-group">
              <label for="data_rozpoczecia" class="block text-sm font-medium text-gray-700">Data</label>
              <input type="date" name="data_rozpoczecia" id="data_rozpoczecia" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" readonly>
            </div>
            <div class="form-group">
              <label for="godz_rozpoczecia" class="block text-sm font-medium text-gray-700">Godzina rozpoczęcia</label>
              <input type="time" name="godz_rozpoczecia" id="godz_rozpoczecia" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="form-group">
              <label for="godz_zakonczenia" class="block text-sm font-medium text-gray-700">Godzina zakończenia</label>
              <input type="time" name="godz_zakonczenia" id="godz_zakonczenia" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
              Zapisz
            </button>
          </span>
          <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
            <button type="button" onclick="closeModal()" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
              Anuluj
            </button>
          </span>
        </div>
      </form>
    </div>
  </div>
</div>
