<?php

namespace App\Exports;

use App\Models\Letter;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LetterExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Letter::get();
    }

    public function headings() : array
    {
        return [
            "No", "Nomor Surat", "Perihal", "Tanggal Keluar", "Penerima Surat", "Notulis", "Hasil Rapat"
        ];
    }

    public function map($item) : array
    {
        $content = strip_tags($item->content);
        $recipient = implode(", ", array_column($item->recipients, 'name'));

        return [
            $item->id,
            $item->letter_type_id,
            $item->letter_perihal,
            $item->created_at,
            $recipient,
            'Pak Hasan',
            $content,
        ];
    }
}
