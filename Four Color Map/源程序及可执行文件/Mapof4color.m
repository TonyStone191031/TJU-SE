function [] = Mapof4color()
%UNTITLED 此处显示有关此函数的摘要
%   用户指定的省填色se,se可取1,2,3,4四个值,1是红色，2是绿色，3是蓝色，4是黄色
mapin=shaperead('省界_region.shp');
map=shaperead('省界_region.shp');
map=Transfer( mapin,map );
N=length(map); %中国地图所包含的省（或其他同级行政区）的数量
A=zeros(N); %A是邻接矩阵，存储各省的边界接壤信息，初始化时全赋零值
for i=1:N %读取地图信息，填充邻接矩阵
    shapei=[map(i).X(:),map(i).Y(:)];
    for j=(i+1):N
        shapej=[map(j).X(:),map(j).Y(:)];
        if size(intersect(shapei,shapej,'rows'),1)>=1 %通过intersect函数判断两省之间是否存在共同点
            A(i,j)=1;
            A(j,i)=1; %若两省存在共同点，则邻接矩阵的相应元素赋为1
        end
    end
end

%附加要求
A(32,33)=1;A(33,32)=1; %规定福建与台湾不可以使用一种颜色
A(34,29)=1;A(29,34)=1; %规定广东与海南不可以使用一种颜色
A(30,31)=1;A(31,30)=1; %规定香港与澳门不可以使用一种颜色

disp('请选择颜色：红色（输入1），绿色（输入2），蓝色（输入3），黄色（输入4）');
se=input('输入颜色：');

disp('选择使用“点击地图交互式(输入数字1)”还是“名称输入交互式（输入数字2）”;注意：如果您希望选择澳门，请务必使用第二种方法。');
choice=input('您选择方式：');
switch choice
    case 1
       geoshow('省界_region.shp');
       [x0,y0]=ginput(1); 
       for i=1:N+1 
           for j=(i+1):N+1 
               [in,~]=inpolygon(x0,y0,map(i).X(:),map(i).Y(:));
               if(in==1) 
                   prov=i; 
               end
           end
       end
    case 2
        char sheng;
        sheng=input('输入省的全称或简称（请务必在名称两边加上英文字符单引号,谢谢）：');
        prov=Choice2(sheng);
end

color=zeros(1,N);
color(prov)=se; 
fag=0; 
k=1;
while(k<=N&&k>=1)
    if(k==prov&&fag==0) 
        k=k+1; 
        if(k>N)
            break; 
        end
    elseif(k==prov&&fag==1) 
        k=k-1; 
    end
    if(fag==0) 
        i=1;col=1;
        while(i<=N) 
            if(A(k,i)==1&&col==color(i)) 
                col=col+1;i=0; 
            end
            if(col>4) 
                break;
            end
            i=i+1;
        end
    else
        i=1;col=color(k)+1;
        while(i<=N) 
            if(A(k,i)==1&&col==color(i)) 
                col=col+1;i=0; 
            end
            if(col>4) 
                break;
            end
            i=i+1;
        end
    end
    if(col==5)
        k=k-1; 
        fag=1; 
    else
        color(k)=col;fag=0;k=k+1; 
    end
end

for i=1:N
    if(color(i)==0)
        color(i)=5; 
    end
end

colour=[1,0,0;0,1,0;0,0,1;1,1,0;0,1,1]; %增加第五种颜色天蓝色，第五种颜色表示改程序无法实现四色时补充给少数省的颜色
figure;
hold on
for i=1:N
    index=find(isnan(map(i).X));
    start=1;
    for j=1:length(index)
        fill(map(i).X(start:(index(j)-1)),map(i).Y(start:(index(j)-1)),colour(color(i),:));
        start=index(j)+1;
    end
end

end

