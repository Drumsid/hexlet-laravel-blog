<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        // поиск по статьям
        $articles = $q ? Article::where('name', 'like', "%{$q}%")->paginate() : Article::paginate(5);

        // $articles = Article::where('name', 'like', "%{$q}%")->get(); вариант поиска без пагинации
        // $articles = Article::paginate();

        // Статьи передаются в шаблон
        // compact('articles') => [ 'articles' => $articles ]
        return view('article.index', compact('articles', 'q'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    // Вывод формы
    public function create()
    {
        // Передаём в шаблон вновь созданный объект. Он нужен для вывода формы через Form::model
        $article = new Article();
        return view('article.create', compact('article'));
    }

    // Здесь нам понадобится объект запроса для извлечения данных
    public function store(Request $request)
    {
        // Проверка введённых данных
        // Если будут ошибки, то возникнет исключение
        $this->validate($request, [
            'name' => 'required|unique:articles',
            'body' => 'required|min:10',
            'state' => [
                'required',
                Rule::in(['draft', 'published']),
            ]
        ]);

        $article = new Article();
        // Заполнение статьи данными из формы
        $article->fill($request->all());
        // При ошибках сохранения возникнет исключение
        $article->save();
        // Редирект на указанный маршрут с добавлением флеш-сообщения
        return redirect()
            ->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $this->validate($request, [
            // У обновления немного изменённая валидация. В проверку уникальности добавляется название поля и id текущего объекта
            // Если этого не сделать, Laravel будет ругаться на то что имя уже существует
            'name' => 'required|unique:articles,name,' . $article->id,
            'body' => 'required|min:10',
            'state' => [
                'required',
                Rule::in(['draft', 'published']),
            ]
        ]);

        $article->fill($request->all());
        $article->save();
        return redirect()
            ->route('articles.index');
    }

    public function destroy($id)
    {
        $category = Article::find($id);
        if ($category) {
            $category->delete();
        }

        return redirect()->route('articles.index');
    }
}
