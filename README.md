# generate_face_by_GA

# 概要
256x256ピクセルの画像を生成し、それがどれほど人間の顔に近いかをスコアとし、遺伝的アルゴリズムによって完全な人間の顔を目指す。

# 環境
- PHP 7.1.15
- PHP-Facedetect 0.1.0 https://github.com/infusion/PHP-Facedetect
- OpenCV 3.4.0

# やりたいこと
1. PHPでランダムに個体生成
2. 生成された画像を顔認識にかける
3. 確度で交叉させる
4. 繰り返し
