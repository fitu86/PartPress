jQuery(function($) {
    const makeFieldKey = 'field_68622b6f82d82';
    const modelFieldKey = 'field_68622bd882d83';

    const $makeField = acf.getField(makeFieldKey);
    const $modelField = acf.getField(modelFieldKey);

    if (!$makeField || !$modelField) return;

    const $makeSelect = $makeField.$el.find('select');
    const $modelSelect = $modelField.$el.find('select');

    function updateModels() {
        const makeId = $makeSelect.val();

        if (!makeId) {
            $modelSelect.html('<option>Selecciona una marca primero</option>').prop('disabled', true);
            return;
        }

        $.ajax({
            url: pp_ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'pp_get_models_by_make',
                nonce: pp_ajax_object.nonce,
                make_id: makeId
            },
            beforeSend: function() {
                $modelSelect.html('<option>Cargando...</option>').prop('disabled', true);
            },
            success: function(response) {
                $modelSelect.prop('disabled', false).empty();
                if (response.success && response.data.length > 0) {
                    $modelSelect.append('<option value="">Selecciona un modelo</option>');
                    $.each(response.data, function(_, item) {
                        $modelSelect.append(new Option(item.text, item.id));
                    });
                } else {
                    $modelSelect.append('<option value="">No hay modelos</option>');
                }
            }
        });
    }

    $makeSelect.on('change', updateModels);
    updateModels();
});
