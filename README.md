symfony hackathon 20111010
==========================

成果を残すためのリポジトリです

本日の目標
----------

- 同一機能での複数テンプレートの振分け

全くの同一機能なんだけど, パラメータ等によって読み込むテンプレートを変更する, というのをやります.

- ユニットテスト/機能テストのテンプレートを自前で用意

sfPHPUnit2Plugin ではデフォルトでテンプレートを生成してくれますが, それを自分の好みに合わせてカスタマイズします.

本日の成果
----------

- 同一機能で複数テンプレートの振分け

このコミットで達成.

https://github.com/yuya-takeyama/symfony-hackathon-20111010/commit/4049a7cf7612a832ebf39d2dd2f69cbf4715343c

テンプレートやレイアウトの変更は sfAction->setTemplate(), sfAction->setLayout() で簡単にできる.  
ただ, テンプレートの配置や運用などが引き続き課題.

- sfJpMobilePlugin のせいで機能テストがコケる件の修正

以下を参照.

https://github.com/yuya-takeyama/symfony-hackathon-20111010/issues/1

- ユニットテスト/機能テストのテンプレートを自前で用意

着手できず.  
改行コードが CRLF だったりするので修正したい.  
インデントも PEAR っぽくしたい.
