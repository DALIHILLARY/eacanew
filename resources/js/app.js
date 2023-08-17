import './bootstrap';
import 'admin-lte';

import * as FilePond from 'filepond';

import FilePondPluginImageExifOrientation from 'filepond-plugin-image-exif-orientation';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginFileRename from 'filepond-plugin-file-rename';
import FilePondPluginImageCrop from 'filepond-plugin-image-crop';
import FilePondPluginImageResize from 'filepond-plugin-image-resize';
import FilePondPluginImageTransform from 'filepond-plugin-image-transform';

import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';


const fileInput = document.querySelector('input[type="file"].filepond');

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginImageExifOrientation,
    FilePondPluginFileValidateType,
    FilePondPluginFileRename,
    FilePondPluginImageCrop,
    FilePondPluginImageResize,
    FilePondPluginImageTransform
    );

    // FilePond.create(fileInput).setOptions({
    //     labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
    //     imagePreviewHeight: 170,
    //     imageCropAspectRatio: '1:1',
    //     imageResizeTargetWidth: 200,
    //     imageResizeTargetHeight: 200,
    //     stylePanelLayout: 'compact circle',
    //     styleLoadIndicatorPosition: 'center bottom',
    //     styleProgressIndicatorPosition: 'right bottom',
    //     styleButtonRemoveItemPosition: 'left bottom',
    //     styleButtonProcessItemPosition: 'right bottom',
    // });

FilePond.create(fileInput).setOptions({
    server: {
        process: {
            url: '/uploads/process',
            method: 'POST',
            withCredentials: false,
            onload: (response) => {
                //Hack to fix the response from the server
                // take part of response before the first <link> tag
                response = response.substring(0, response.indexOf('<link'));
                // add base url to our relative url
                console.log(response);
                return response;
            }
        },
        // process: '/uploads/process',
        revert: '/uploads/revert',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        },
    }
});