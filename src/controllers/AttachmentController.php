<?php

class AttachmentController extends BaseController
{

    public function upload($model, $accepted_mimes = ['pdf', 'doc', 'docx', 'xls', 'xlxs', 'rtf', 'txt', 'jpg', 'jpeg', 'png', 'gif', 'tiff'])
    {
        $errors = null;

        if (Input::hasFile('attachments')) {
            foreach (array_filter(Input::file('attachments')) as $file) {
                if ($file->isValid()) {

                    $rules = ['attachment' => 'mimes:' . implode(',', $accepted_mimes)];

                    $validator = Validator::make(['attachment' => $file], $rules);

                    if ($validator->passes()) {
                        $size = $file->getSize();
                        $accepted_size = 3000;

                        if ($size < ($accepted_size * 1024)) {
                            $attachment = new Attachment;
                            $attachment->name = $file->getClientOriginalName();
                            $attachment->size = $file->getSize();

                            $path_hash = md5(microtime() . $attachment->name);
                            $attachment->path = substr($path_hash, 0, 4) . '/' . substr($path_hash, 4, 4) . '/';

                            if ($file->move(public_path('uploads/' . $attachment->path), $attachment->name)) {
                                $attachment->save();

                                $model->attachments()->attach($attachment->id);
                            }
                        } else {
                            $errors = $validator->messages();
                            $errors->add('Error', 'Failed to upload \'' . $file->getClientOriginalName() . '\' because the file is larger than ' . $accepted_size . 'KB');
                            Session::flash('errors', $errors);
                        }
                    } else {
                        $errors = $validator->messages();
                        $errors->add('Error', 'Failed to upload \'' . $file->getClientOriginalName() . '\' because the file format is not allowed');
                        Session::flash('errors', $errors);
                    }
                } else {
                    $errors = $validator->messages();
                    $errors->add('Error', 'Failed to upload \'' . $file->getClientOriginalName() . '\' because it was an invalid file');
                    Session::flash('errors', $errors);
                }
            }
        }

        return $errors;
    }

    public function destroy($id)
    {
        Attachment::find($id)->delete();

        return '';
    }

}
