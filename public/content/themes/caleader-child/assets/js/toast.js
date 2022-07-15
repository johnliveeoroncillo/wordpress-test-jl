function showToast(data) {
    jQuery.toast({
        heading: data.heading,
        text: data.message,
        icon: data.type,
        position: 'top-right',
        stack: false,
        allowToastClose: true,
        // hideAfter: false,
    })
}