$(document).ready(function() {
    $('#account-category #service-form').on('submit', function(e) {
        e.preventDefault();
        let keyword = $('#keyword--search').val().trim();
        let searchType = $('#type--search').val();
        loadSearchResults(keyword, searchType);
    });
    $('body').on('keyup', '#mobile_keyword--search', function() {
        let keyword = $(this).val().trim().toLowerCase();
        let searchType = $('#type--search').val();
        loadSearchResults(keyword, searchType);
    });

    function showLoadingSpinner() {
        let loadingContainer = $('<div class="loading-container"></div>');
        let loadingWrap = $('<div class="loading-wrap c-my-24"><span class="modal-loader-spin"></span></div>');
        loadingContainer.append(loadingWrap);
        $('.layout').append(loadingContainer);
    }

    function hideLoadingSpinner() {
        $('.loading-container').remove();
    }

    function loadSearchResults(keyword, searchType) {
        let listService = $('.list-service');
        listService.empty();
        showLoadingSpinner();
        $.post('searchsrc', {
            searchKeyword: keyword,
            searchType: searchType
        }).done(function(data) {
            listService.html(data);
            hideLoadingSpinner();
        });
    }
});