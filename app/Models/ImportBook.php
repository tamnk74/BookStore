<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ImportBook
 * @package App\Models
 * @version February 27, 2017, 8:57 am UTC
 */
class ImportBook extends Model
{
    use SoftDeletes;

    public $table = 'import_books';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'book_id',
        'amount',
        'date',
        'buy_price',
        'sell_price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'book_id' => 'integer',
        'amount' => 'integer',
        'date' => 'date',
        'buy_price' => 'integer',
        'sell_price' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'book_id' => 'required',
        'amount' => 'required|numeric',
        'buy_price' => 'required|numeric',
        'sell_price' => 'numeric'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    
    public function getImportBookInDay($date)
    {
        self::leftJoin('books', 'books.id', '=', 'import_books.book_id')
                ->select('name', \Illuminate\Support\Facades\DB::raw('SUM(amount) as sum'))
                ->whereDate('bill_details.created_at', $date)
                ->groupBy('name')
                ->orderBy('sum', 'desc')
                ->limit(5)
                ->get()
                ->toArray();
    }
    
}
