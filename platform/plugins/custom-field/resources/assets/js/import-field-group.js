export class Helpers {
    static jsonDecode(jsonString, defaultValue) {
        if (typeof jsonString === 'string') {
            let result
            try {
                result = $.parseJSON(jsonString)
            } catch (err) {
                result = defaultValue
            }
            return result
        }
        return null
    }
}

;(($) => {
    let $body = $('body')

    $body.on('click', 'form.import-field-group button.btn.btn-secondary.action-item:nth-child(2)', (event) => {
        event.preventDefault()
        event.stopPropagation()
        let $form = $(event.currentTarget).closest('form')
        $form.find('input[type=file]').val('').trigger('click')
    })

    $body.on('change', 'form.import-field-group input[type=file]', (event) => {
        let $form = $(event.currentTarget).closest('form')
        let file = event.currentTarget.files[0]
        if (file) {
            let reader = new FileReader()
            reader.readAsText(file)
            reader.onload = (e) => {
                const json = Helpers.jsonDecode(e.target.result)

                Botble.blockUI()

                $httpClient
                    .make()
                    .post($form.attr('action'), { json_data: json })
                    .then(({ data }) => {
                        Botble.showSuccess(data.messages)
                        const tableId = $form.find('table').prop('id')
                        if (window.LaravelDataTables[tableId]) {
                            window.LaravelDataTables[tableId].draw()
                        }
                    })
                    .finally(() => {
                        Botble.unblockUI()
                    })
            }
        }
    })
})(jQuery)
