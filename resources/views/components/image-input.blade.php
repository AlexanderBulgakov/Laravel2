@props(['value' => ''])

<div x-data="{
    imageUrl: $el.dataset.url,
    fileTypes: ['jpg', 'jpeg', 'png'],

    fileChosen(event) {
        this.imageUrl = '';

        this.fileToDataUrl(event, src => this.imageUrl = src);
    },

    fileToDataUrl(event, callback) {
        if (! event.target.files.length) return;

        let file = event.target.files[0];
        let reader = new FileReader();
        let extension = file.name.split('.').pop().toLowerCase();

        if(this.fileTypes.indexOf(extension) > -1){
            reader.readAsDataURL(file);
            reader.onload = e => callback(e.target.result);
        }
    },
}" data-url="{{ $value }}" class="mt-1 flex flex-col sm:flex-row items-center justify-center">
    <template x-if="imageUrl">
        <img :src="imageUrl" class="block object-cover w-full rounded h-44">
    </template>
    <template x-if="!imageUrl">
        <div class="block w-full border rounded border-gray-200 bg-gray-100 h-44"></div>
    </template>
    <input type="file" accept="image/*" @change="fileChosen" {!! $attributes->merge(['class' => 'p-2 block w-full']) !!}>
</div>
